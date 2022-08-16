<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\FeatureResource;
use App\Models\Feature;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class FeatureController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/feature/index",
     *    operationId="IndexFeature",
     *    tags={"Feature"},
     *    summary="Get All Features",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *    @OA\Parameter(
     *        name="language",
     *        example="en",
     *        in="header",
     *        description="app language",
     *        required=false,
     *        @OA\Schema(
     *            type="string",
     *        )
     *    ),
     *    
     *    @OA\Parameter(
     *        name="fcmtoken",
     *        example="14265416154646",
     *        in="header",
     *        description="add fcm token to user",
     *        required=false,
     *        @OA\Schema(
     *            type="string",
     *        )
     *    ),
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
     *    @OA\Parameter(
     *        name="filter[feature_title_id]",
     *        example=1,
     *        in="query",
     *        description="filter by featureTitle",
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
     *              example="this is all features"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="features",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/FeatureResource"
     *                 )
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
        $features = QueryBuilder::for(Feature::orderBy('id'))
            ->allowedFilters([AllowedFilter::exact('feature_title_id')]);

        return response()->success(
            'this is all Features',
            [
                "features" => FeatureResource::collection($features->paginate(request()->perPage ?? $features->count())),
            ]
        );
    }
}
