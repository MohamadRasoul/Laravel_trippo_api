<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Enums\ModelEnum;
use App\Events\showModel;
use App\Http\Controllers\Controller;

use App\Models\Place;

use App\Services\ImageService;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Resources\ImageResource;
use App\Http\Resources\Mobile\PlaceResource;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    /**
     * @OA\Get(
     *    path="/api/mobile/place/index",
     *    operationId="IndexPlace",
     *    tags={"Place"},
     *    summary="Get All Places",
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
     *              example="this is all places"
     *           ),
     *          @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="places",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/PlaceResource"
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
        $places = Place::with(['comments'])->inRandomOrder();

        return response()->success(
            'this is all Places',
            [
                "places" => PlaceResource::collection($places->paginate(request()->perPage ?? $places->count())),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/place/indexwithSearch",
     *    operationId="IndexPlacewithSearch",
     *    tags={"Place"},
     *    summary="Get All Places",
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
     *    @OA\Parameter(
     *        name="name",
     *        in="query",
     *        description="filter by name",
     *        required=false,
     *        @OA\Schema(
     *            type="string",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="placeRating",
     *        in="query",
     *        description="filter by placeRating",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="feature_id",
     *        in="query",
     *        description="filter by feature",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="type_id",
     *        in="query",
     *        description="filter by type",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="option_id",
     *        in="query",
     *        description="filter by option",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
     *    @OA\Parameter(
     *        name="city_id",
     *        in="query",
     *        description="filter by city",
     *        required=false,
     *        @OA\Schema(
     *            type="integer",
     *        )
     *    ),
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
     *              example="this is all places"
     *           ),
     *          @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="places",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/PlaceResource"
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
    public function indexwithSearch(Request $request)
    {
        $name = $request->name;
        $placeRating = $request->placeRating;
        $feature = $request->feature_id;
        $type = $request->type_id;
        $option = $request->option_id;
        $city = $request->city_id;

        $places = Place::query()
            ->when($name, function ($query, $name) {
                $query->where('name', 'like', "%$name%");
            })
            ->when($placeRating, function ($query, $placeRating) {
                $query->where('ratting', $placeRating);
            })
            ->when($type, function ($query, $type) {
                $query->where('type_id', $type);
            })
            ->when($city, function ($query, $city) {
                $query->where('city_id', $city);
            })
            ->when($feature, function ($query, $feature) {
                $query->whereHas('featurePlaces', function ($query) use ($feature) {
                    $query->where('feature_id', $feature);
                });
            })
            ->when($option, function ($query, $option) {
                $query->whereHas('optionPlaces', function ($query) use ($option) {
                    $query->where('option_id', $option);
                });
            });


        return response()->success(
            'this is all Places',
            [
                "places" => PlaceResource::collection($places->paginate(request()->perPage ?? $places->count())),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/place/{id}/image/index",
     *    operationId="indexPlaceImage",
     *    tags={"Place"},
     *    summary="Get All Place Image",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Place ID",
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
     *              example="this is all images for place"
     *           ),
     *          @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="images",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/ImageResource"
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
    public function indexImage(Place $place)
    {
        $placeImage = $place->getMedia('place')->flatten();
        $placeImageAdmin = $place->getMedia('place_admin')->flatten();
        $placeImageUser = count($place->getMedia('place_user', ['isAccept' => true])) > 0 ? $place->getMedia('place_user', ['isAccept' => true])->flatten() : [];
        $images = $placeImage->merge($placeImageAdmin)->merge($placeImageUser);

        return response()->success(
            'this is all images for place',
            [
                "images" => ImageResource::collection($images),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/place/{id}/show",
     *    operationId="ShowPlace",
     *    tags={"Place"},
     *    summary="Get Place By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Place ID",
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
     *              example="this is your place"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="place",
     *                 type="object",
     *                 ref="#/components/schemas/PlaceResource"
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
    public function show(Place $place)
    {
        event(new showModel($place, ModelEnum::Place));

        return response()->success(
            'this is your place',
            [
                "place" => new PlaceResource($place),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/place/{placeId}/image/store",
     *    operationId="AddImageToPlace",
     *    tags={"Place"},
     *    summary="Add Image To Place",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="placeId",
     *        example=1,
     *        in="path",
     *        description="Place ID",
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
     *              example="place is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="place",
     *                 type="object",
     *                 ref="#/components/schemas/PlaceResource"
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
    public function addImage(Request $request, Place $place)
    {

        (new ImageService)->storeImage(
            model: $place,
            image: $request->image,
            collection: 'place_user',
            customProperties: ['isAccept' => false]
        );



        return response()->success(
            'image for place is added success',
            [
                "place" => new PlaceResource($place),
            ]
        );
    }

    // TODO : add Swagger
    public function getPlacesWithPointMap(Request $request)
    {
        $places = Place::whereBetween('longitude', [min($request->northeast_lng, $request->southwest_lng), max($request->northeast_lng, $request->southwest_lng)])
            ->whereBetween('latitude', [min($request->northeast_lat, $request->southwest_lat), max($request->northeast_lat, $request->southwest_lat)])
            ->where('type_id', $request->type_id);

        return response()->success(
            'this is Places',
            [
                "places" => PlaceResource::collection($places->paginate(request()->perPage ?? $places->count())),
            ]
        );
    }
}
