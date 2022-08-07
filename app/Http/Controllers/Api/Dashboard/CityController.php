<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Resources\Dashboard\CityResource;
use App\Models\City;

use App\Services\ImageService;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/dashboard/city/index",
     *    operationId="IndexCity",
     *    tags={"City"},
     *    summary="Get All Cities",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="perPage",
     *       example=10,
     *       in="query",
     *       description="Number of item per page",
     *       required=false,
     *       @OA\Schema(
     *           type="integer",
     *       )
     *    ),
     *    @OA\Parameter(
     *        name="page",
     *        example=1,
     *        in="query",
     *        description="Page number",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="this is all cities"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="cities",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/CityResource"
     *                 ),
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function index()
    {
        $cities = City::orderBy('id');

        return response()->success(
            'this is all Cities',
            [
                "cities" => CityResource::collection($cities->paginate(request()->perPage ?? $cities->count())),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/dashboard/city/store",
     *    operationId="StoreCity",
     *    tags={"City"},
     *    summary="Add City",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreCityRequest")
     *       )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="city is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="city",
     *                 type="object",
     *                 ref="#/components/schemas/CityResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->validated());

        (new ImageService)->storeImage(
            model: $city,
            image: $request->image,
            collection: 'city'
        );

        return response()->success(
            'city is added success',
            [
                "city" => new CityResource($city),
            ]
        );
    }

    /**
     * @OA\Post(
     *    path="/api/dashboard/city/{cityId}/image/store",
     *    operationId="AddImageToCity",
     *    tags={"City"},
     *    summary="Add Image To City",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="cityId",
     *        example=1,
     *        in="path",
     *        description="City ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                required={"image"},
     *                 @OA\Property(
     *                     description="image to upload",
     *                     property="image",
     *                     type="string",
     *                     example="image.png",
     *                ),
     *             )
     *         )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="city is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="city",
     *                 type="object",
     *                 ref="#/components/schemas/CityResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function addImage(Request $request, City $city)
    {

        (new ImageService)->storeImage(
            model: $city,
            image: $request->image,
            collection: 'city_admin',
        );

        return response()->success(
            'city is added success',
            [
                "city" => new CityResource($city),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/dashboard/city/{id}/show",
     *    operationId="ShowCity",
     *    tags={"City"},
     *    summary="Get City By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="City ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="this is your city"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="city",
     *                 type="object",
     *                 ref="#/components/schemas/CityResource"
     *              ),
     *           )
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function show(City $city)
    {
        return response()->success(
            'this is your city',
            [
                "city" => new CityResource($city),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/dashboard/city/{id}/update",
     *    operationId="UpdateCity",
     *    tags={"City"},
     *    summary="Edit City",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="City ID",
     *       required=true,
     *       @OA\Schema(
     *           type="integer"
     *       )
     *    ),
     *
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/UpdateCityRequest")
     *       )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="city is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="city",
     *                 type="object",
     *                 ref="#/components/schemas/CityResource"
     *              ),
     *           )
     *        ),
     *     ),
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());

        (new ImageService)->storeImage(
            model: $city,
            image: $request->image,
            collection: 'city'
        );

        return response()->success(
            'city is updated success',
            [
                "city" => new CityResource($city),
            ]
        );
    }

    /**
     * @OA\Delete(
     *    path="/api/dashboard/city/{id}/delete",
     *    operationId="DeleteCity",
     *    tags={"City"},
     *    summary="Delete City By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="City ID",
     *        required=true,
     *        @OA\Schema(
     *            type="integer"
     *        )
     *    ),
     *
     *
     *
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *        @OA\JsonContent(
     *           @OA\Property(
     *              property="success",
     *              type="boolean",
     *              example="true"
     *           ),
     *           @OA\Property(
     *              property="message",
     *              type="string",
     *              example="city is deleted success"
     *           ),
     *        ),
     *     ),
     *
     *     @OA\Response(
     *        response=401,
     *        description="Error: Unauthorized",
     *        @OA\Property(
     *           property="message",
     *           type="string",
     *           example="Unauthenticated."
     *        ),
     *     )
     * )
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->success('city is deleted success');
    }
}
