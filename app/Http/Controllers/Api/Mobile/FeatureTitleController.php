<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\FeatureTitleResource;
use App\Models\FeatureTitle;


class FeatureTitleController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/featureTitle/index",
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


}
