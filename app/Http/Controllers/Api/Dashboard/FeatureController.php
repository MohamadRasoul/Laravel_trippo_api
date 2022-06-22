<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Http\Resources\Dashboard\FeatureResource;
use App\Models\Feature;
use App\Models\FeatureTitle;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class FeatureController extends Controller
{
    /**
     * @OA\Get(
     *    path="/Api/dashboard/feature/index",
     *    operationId="IndexFeature",
     *    tags={"Feature"},
     *    summary="Get All Features",
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


    /**
     * @OA\Post(
     *    path="/Api/dashboard/feature/featureTitle/{featureTitleId}/store",
     *    operationId="StoreFeature",
     *    tags={"Feature"},
     *    summary="Add Feature",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *    @OA\Parameter(
     *       name="featureTitleId",
     *       example=1,
     *       in="path",
     *       description="FeatureTitle ID",
     *       required=true,
     *       @OA\Schema(
     *           type="integer"
     *       )
     *    ),
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreFeatureRequest")
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
     *              example="feature is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="feature",
     *                 type="object",
     *                 ref="#/components/schemas/FeatureResource"
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
    public function store(StoreFeatureRequest $request, FeatureTitle $featureTitle)
    {
        $feature = $featureTitle->features()->create($request->validated());

        return response()->success(
            'feature is added success',
            [
                "feature" => new FeatureResource($feature),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/Api/dashboard/feature/{id}/update",
     *    operationId="UpdateFeature",
     *    tags={"Feature"},
     *    summary="Edit Feature",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="Feature ID",
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
     *           @OA\Schema(ref="#/components/schemas/UpdateFeatureRequest")
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
     *              example="feature is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="feature",
     *                 type="object",
     *                 ref="#/components/schemas/FeatureResource"
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
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $feature->update($request->validated());


        return response()->success(
            'feature is updated success',
            [
                "feature" => new FeatureResource($feature),
            ]
        );
    }

    /**
     * @OA\Delete(
     *    path="/Api/dashboard/feature/{id}/delete",
     *    operationId="DeleteFeature",
     *    tags={"Feature"},
     *    summary="Delete Feature By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Feature ID",
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
     *              example="feature is deleted success"
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
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return response()->success('feature is deleted success');
    }
}
