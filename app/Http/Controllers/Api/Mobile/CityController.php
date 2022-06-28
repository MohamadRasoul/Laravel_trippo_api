<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\CityResource;
use App\Models\City;


class CityController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/city/index",
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
     * @OA\Get(
     *    path="/api/mobile/city/indexTrending",
     *    operationId="IndexTrendingCity",
     *    tags={"City"},
     *    summary="Get All Cities Sort By Views",
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
    public function indexTrending()
    {
        $cities = City::orderBy('views', 'desc');

        return response()->success(
            'this is all Cities Sort By Views',
            [
                "cities" => CityResource::collection($cities->paginate(request()->perPage ?? $cities->count())),
            ]
        );
    }

}
