<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\Feature;

use App\Services\ImageService;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;


class FeatureController extends Controller
{
    // /** 
    //  * @OA\Get(
    //  *    path="/api/feature/index",
    //  *    operationId="IndexFeature",
    //  *    tags={"Feature"},
    //  *    summary="Get All Features",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
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
    //  *              example="this is all features"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="features",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/FeatureResource"
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
        $features = Feature::orderBy('id');

        return response()->success(
            'this is all Features',
            [
                "features" => FeatureResource::collection($features->paginate(request()->perPage ?? $features->count())),
            ]
        );
    }

    
    // /** 
    //  * @OA\Post(
    //  *    path="/api/feature/store",
    //  *    operationId="StoreFeature",
    //  *    tags={"Feature"},
    //  *    summary="Add Feature",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\RequestBody(
    //  *        required=true,
    //  *        @OA\MediaType(mediaType="application/json",
    //  *           @OA\Schema(ref="#/components/schemas/StoreFeatureRequest")
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
    //  *              example="feature is added success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="feature",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/FeatureResource"
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
    public function store(StoreFeatureRequest $request)
    {
         $feature = Feature::create($request->validated());

        (new ImageService)->storeImage(
            model: $feature,
            image: $request->image,
            collection: 'feature'
        );

        return response()->success(
            'feature is added success',
            [
                "feature" => new FeatureResource($feature),
            ]
        );
    }

    
    // /** 
    //  * @OA\Get(
    //  *    path="/api/feature/{id}/show",
    //  *    operationId="ShowFeature",
    //  *    tags={"Feature"},
    //  *    summary="Get Feature By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="Feature ID",
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
    //  *              example="this is your feature"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="feature",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/FeatureResource"
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
    public function show(Feature $feature)
    {
        return response()->success(
            'this is your feature',
            [
                "feature" => new FeatureResource($feature),
            ]
        );
    }

   
    // /** 
    //  * @OA\Post(
    //  *    path="/api/feature/{id}/update",
    //  *    operationId="UpdateFeature",
    //  *    tags={"Feature"},
    //  *    summary="Edit Feature",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *       name="id",
    //  *       example=1,
    //  *       in="path",
    //  *       description="Feature ID",
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
    //  *           @OA\Schema(ref="#/components/schemas/UpdateFeatureRequest")
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
    //  *              example="feature is updated success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="feature",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/FeatureResource"
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
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
         $feature->update($request->validated());

        (new ImageService)->storeImage(
            model: $feature,
            image: $request->image,
            collection: 'feature'
        );

        return response()->success(
            'feature is updated success',
            [
                "feature" => new FeatureResource($feature),
            ]
        );
    }

    // /** 
    //  * @OA\Delete(
    //  *    path="/api/feature/{id}/delete",
    //  *    operationId="DeleteFeature",
    //  *    tags={"Feature"},
    //  *    summary="Delete Feature By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="Feature ID",
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
    //  *              example="feature is deleted success"
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
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return response()->success('feature is deleted success');
    }
}
