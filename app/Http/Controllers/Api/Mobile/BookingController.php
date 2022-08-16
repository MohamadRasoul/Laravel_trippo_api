<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\Booking;

use App\Services\ImageService;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;


class BookingController extends Controller
{
    // /**
    //  * @OA\Get(
    //  *    path="/api/mobile/booking/index",
    //  *    operationId="IndexBooking",
    //  *    tags={"Booking"},
    //  *    summary="Get All Bookings",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *    @OA\Parameter(
    //  *        name="language",
    //  *        example="en",
    //  *        in="header",
    //  *        description="app language",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *    
    //  *    @OA\Parameter(
    //  *        name="fcmtoken",
    //  *        example="14265416154646",
    //  *        in="header",
    //  *        description="add fcm token to user",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *       name="perPage",
    //  *       example=10,
    //  *       in="query",
    //  *       description="Number of item per page",
    //  *       required=false,
    //  *       @OA\Schema(
    //  *           type="integer",
    //  *       )
    //  *    ),
    //  *    @OA\Parameter(
    //  *        name="page",
    //  *        example=1,
    //  *        in="query",
    //  *        description="Page number",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="integer",
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Response(
    //  *        response=200,
    //  *        description="Successful operation",
    //  *        @OA\JsonContent(
    //  *           @OA\Property(
    //  *              property="success",
    //  *              type="boolean",
    //  *              example="true"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="message",
    //  *              type="string",
    //  *              example="this is all bookings"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="bookings",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/BookingResource"
    //  *              ),
    //  *           )
    //  *        ),
    //  *     ),
    //  *
    //  *     @OA\Response(
    //  *        response=401,
    //  *        description="Error: Unauthorized",
    //  *        @OA\Property(
    //  *           property="message",
    //  *           type="string",
    //  *           example="Unauthenticated."
    //  *        ),
    //  *     )
    //  * )
    //  */
    public function index()
    {
        $bookings = Booking::orderBy('id');

        return response()->success(
            'this is all Bookings',
            [
                "bookings" => BookingResource::collection($bookings->paginate(request()->perPage ?? $bookings->count())),
            ]
        );
    }


    // /**
    //  * @OA\Post(
    //  *    path="/api/mobile/booking/store",
    //  *    operationId="StoreBooking",
    //  *    tags={"Booking"},
    //  *    summary="Add Booking",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *    @OA\Parameter(
    //  *        name="language",
    //  *        example="en",
    //  *        in="header",
    //  *        description="app language",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *    
    //  *    @OA\Parameter(
    //  *        name="fcmtoken",
    //  *        example="14265416154646",
    //  *        in="header",
    //  *        description="add fcm token to user",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\RequestBody(
    //  *        required=true,
    //  *        @OA\MediaType(mediaType="application/json",
    //  *           @OA\Schema(ref="#/components/schemas/StoreBookingRequest")
    //  *       )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Response(
    //  *        response=200,
    //  *        description="Successful operation",
    //  *        @OA\JsonContent(
    //  *           @OA\Property(
    //  *              property="success",
    //  *              type="boolean",
    //  *              example="true"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="message",
    //  *              type="string",
    //  *              example="booking is added success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="booking",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/BookingResource"
    //  *              ),
    //  *           )
    //  *        ),
    //  *     ),
    //  *
    //  *     @OA\Response(
    //  *        response=401,
    //  *        description="Error: Unauthorized",
    //  *        @OA\Property(
    //  *           property="message",
    //  *           type="string",
    //  *           example="Unauthenticated."
    //  *        ),
    //  *     )
    //  * )
    //  */
    public function store(StoreBookingRequest $request)
    {
         $booking = Booking::create($request->validated());

        (new ImageService)->storeImage(
            model: $booking,
            image: $request->image,
            collection: 'booking'
        );

        return response()->success(
            'booking is added success',
            [
                "booking" => new BookingResource($booking),
            ]
        );
    }


    // /**
    //  * @OA\Get(
    //  *    path="/api/mobile/booking/{id}/show",
    //  *    operationId="ShowBooking",
    //  *    tags={"Booking"},
    //  *    summary="Get Booking By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *    @OA\Parameter(
    //  *        name="language",
    //  *        example="en",
    //  *        in="header",
    //  *        description="app language",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *    
    //  *    @OA\Parameter(
    //  *        name="fcmtoken",
    //  *        example="14265416154646",
    //  *        in="header",
    //  *        description="add fcm token to user",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="Booking ID",
    //  *        required=true,
    //  *        @OA\Schema(
    //  *           type="integer"
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Response(
    //  *        response=200,
    //  *        description="Successful operation",
    //  *        @OA\JsonContent(
    //  *           @OA\Property(
    //  *              property="success",
    //  *              type="boolean",
    //  *              example="true"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="message",
    //  *              type="string",
    //  *              example="this is your booking"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="booking",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/BookingResource"
    //  *              ),
    //  *           )
    //  *        ),
    //  *     ),
    //  *
    //  *     @OA\Response(
    //  *        response=401,
    //  *        description="Error: Unauthorized",
    //  *        @OA\Property(
    //  *           property="message",
    //  *           type="string",
    //  *           example="Unauthenticated."
    //  *        ),
    //  *     )
    //  * )
    //  */
    public function show(Booking $booking)
    {
        return response()->success(
            'this is your booking',
            [
                "booking" => new BookingResource($booking),
            ]
        );
    }


    // /**
    //  * @OA\Post(
    //  *    path="/api/mobile/booking/{id}/update",
    //  *    operationId="UpdateBooking",
    //  *    tags={"Booking"},
    //  *    summary="Edit Booking",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *    @OA\Parameter(
    //  *        name="language",
    //  *        example="en",
    //  *        in="header",
    //  *        description="app language",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *    
    //  *    @OA\Parameter(
    //  *        name="fcmtoken",
    //  *        example="14265416154646",
    //  *        in="header",
    //  *        description="add fcm token to user",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *       name="id",
    //  *       example=1,
    //  *       in="path",
    //  *       description="Booking ID",
    //  *       required=true,
    //  *       @OA\Schema(
    //  *           type="integer"
    //  *       )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\RequestBody(
    //  *        required=true,
    //  *        @OA\MediaType(mediaType="application/json",
    //  *           @OA\Schema(ref="#/components/schemas/UpdateBookingRequest")
    //  *       )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Response(
    //  *        response=200,
    //  *        description="Successful operation",
    //  *        @OA\JsonContent(
    //  *           @OA\Property(
    //  *              property="success",
    //  *              type="boolean",
    //  *              example="true"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="message",
    //  *              type="string",
    //  *              example="booking is updated success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="booking",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/BookingResource"
    //  *              ),
    //  *           )
    //  *        ),
    //  *     ),
    //  *     @OA\Response(
    //  *        response=401,
    //  *        description="Error: Unauthorized",
    //  *        @OA\Property(
    //  *           property="message",
    //  *           type="string",
    //  *           example="Unauthenticated."
    //  *        ),
    //  *     )
    //  * )
    //  */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
         $booking->update($request->validated());

        (new ImageService)->storeImage(
            model: $booking,
            image: $request->image,
            collection: 'booking'
        );

        return response()->success(
            'booking is updated success',
            [
                "booking" => new BookingResource($booking),
            ]
        );
    }

    // /**
    //  * @OA\Delete(
    //  *    path="/api/mobile/booking/{id}/delete",
    //  *    operationId="DeleteBooking",
    //  *    tags={"Booking"},
    //  *    summary="Delete Booking By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *    @OA\Parameter(
    //  *        name="language",
    //  *        example="en",
    //  *        in="header",
    //  *        description="app language",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *    
    //  *    @OA\Parameter(
    //  *        name="fcmtoken",
    //  *        example="14265416154646",
    //  *        in="header",
    //  *        description="add fcm token to user",
    //  *        required=false,
    //  *        @OA\Schema(
    //  *            type="string",
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="Booking ID",
    //  *        required=true,
    //  *        @OA\Schema(
    //  *            type="integer"
    //  *        )
    //  *    ),
    //  *
    //  *
    //  *
    //  *    @OA\Response(
    //  *        response=200,
    //  *        description="Successful operation",
    //  *        @OA\JsonContent(
    //  *           @OA\Property(
    //  *              property="success",
    //  *              type="boolean",
    //  *              example="true"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="message",
    //  *              type="string",
    //  *              example="booking is deleted success"
    //  *           ),
    //  *        ),
    //  *     ),
    //  *
    //  *     @OA\Response(
    //  *        response=401,
    //  *        description="Error: Unauthorized",
    //  *        @OA\Property(
    //  *           property="message",
    //  *           type="string",
    //  *           example="Unauthenticated."
    //  *        ),
    //  *     )
    //  * )
    //  */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->success('booking is deleted success');
    }
}
