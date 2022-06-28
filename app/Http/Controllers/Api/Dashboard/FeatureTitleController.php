<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureTitleRequest;
use App\Http\Requests\UpdateFeatureTitleRequest;
use App\Http\Resources\Dashboard\FeatureTitleResource;
use App\Models\FeatureTitle;
use App\Services\ImageService;


class FeatureTitleController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/dashboard/featureTitle/index",
     *    operationId="IndexFeatureTitle",
     *    tags={"FeatureTitle"},
     *    summary="Get All FeatureTitles",
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
     *              example="this is all featureTitles"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="featureTitles",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/FeatureTitleResource"
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
        $featureTitles = FeatureTitle::orderBy('id');

        return response()->success(
            'this is all FeatureTitles',
            [
                "featureTitles" => FeatureTitleResource::collection($featureTitles->paginate(request()->perPage ?? $featureTitles->count())),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/dashboard/featureTitle/store",
     *    operationId="StoreFeatureTitle",
     *    tags={"FeatureTitle"},
     *    summary="Add FeatureTitle",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreFeatureTitleRequest")
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
     *              example="featureTitle is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="featureTitle",
     *                 type="object",
     *                 ref="#/components/schemas/FeatureTitleResource"
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
    public function store(StoreFeatureTitleRequest $request)
    {
        $featureTitle = FeatureTitle::create($request->validated());

        (new ImageService)->storeImage(
            model: $featureTitle,
            image: $request->image,
            collection: 'featureTitle'
        );

        return response()->success(
            'featureTitle is added success',
            [
                "featureTitle" => new FeatureTitleResource($featureTitle),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/dashboard/featureTitle/{id}/show",
     *    operationId="ShowFeatureTitle",
     *    tags={"FeatureTitle"},
     *    summary="Get FeatureTitle By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="FeatureTitle ID",
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
     *              example="this is your featureTitle"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="featureTitle",
     *                 type="object",
     *                 ref="#/components/schemas/FeatureTitleResource"
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
    public function show(FeatureTitle $featureTitle)
    {
        return response()->success(
            'this is your featureTitle',
            [
                "featureTitle" => new FeatureTitleResource($featureTitle),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/dashboard/featureTitle/{id}/update",
     *    operationId="UpdateFeatureTitle",
     *    tags={"FeatureTitle"},
     *    summary="Edit FeatureTitle",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="FeatureTitle ID",
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
     *           @OA\Schema(ref="#/components/schemas/UpdateFeatureTitleRequest")
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
     *              example="featureTitle is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="featureTitle",
     *                 type="object",
     *                 ref="#/components/schemas/FeatureTitleResource"
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
    public function update(UpdateFeatureTitleRequest $request, FeatureTitle $featureTitle)
    {
        $featureTitle->update($request->validated());

        (new ImageService)->storeImage(
            model: $featureTitle,
            image: $request->image,
            collection: 'featureTitle'
        );

        return response()->success(
            'featureTitle is updated success',
            [
                "featureTitle" => new FeatureTitleResource($featureTitle),
            ]
        );
    }

    /**
     * @OA\Delete(
     *    path="/api/dashboard/featureTitle/{id}/delete",
     *    operationId="DeleteFeatureTitle",
     *    tags={"FeatureTitle"},
     *    summary="Delete FeatureTitle By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="FeatureTitle ID",
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
     *              example="featureTitle is deleted success"
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
    public function destroy(FeatureTitle $featureTitle)
    {
        $featureTitle->delete();

        return response()->success('featureTitle is deleted success');
    }
}
