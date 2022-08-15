<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\PlanContent;

use App\Services\ImageService;
use App\Http\Requests\StorePlanContentRequest;
use App\Http\Requests\UpdatePlanContentRequest;
use App\Http\Resources\Mobile\PlanContentResource;
use App\Models\Place;
use App\Models\Plan;

class PlanContentController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/planContent/plan/{planId}/index",
     *    operationId="IndexPlanContentByPlan",
     *    tags={"PlanContent"},
     *    summary="Get All PlanContents By Plan",
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
     *        name="planId",
     *        example=1,
     *        in="path",
     *        description="Plan ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
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
     *              example="this is all planContents"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="planContents",
     *                 type="object",
     *                 ref="#/components/schemas/PlanContentResource"
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
    public function indexByPlan(Plan $plan)
    {
        $planContents = $plan->planContents()->orderBy('id');

        return response()->success(
            'this is all PlanContents',
            [
                "planContents" => PlanContentResource::collection($planContents->paginate(request()->perPage ?? $planContents->count())),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/api/mobile/planContent/{id}/show",
     *    operationId="ShowPlanContent",
     *    tags={"PlanContent"},
     *    summary="Get PlanContent By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="PlanContent ID",
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
     *              example="this is your planContent"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="planContent",
     *                 type="object",
     *                 ref="#/components/schemas/PlanContentResource"
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
    public function show(PlanContent $planContent)
    {
        return response()->success(
            'this is your planContent',
            [
                "planContent" => new PlanContentResource($planContent),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/planContent/plan/{planId}/store",
     *    operationId="StorePlanContent",
     *    tags={"PlanContent"},
     *    summary="Add PlanContent",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *    @OA\Parameter(
     *        name="planId",
     *        example=1,
     *        in="path",
     *        description="Plan ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StorePlanContentRequest")
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
     *              example="planContent is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="planContent",
     *                 type="object",
     *                 ref="#/components/schemas/PlanContentResource"
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
    public function store(StorePlanContentRequest $request, Plan $plan)
    {
        $planContent = $plan->planContents()->create($request->validated());

        $place = Place::find($request->place_id);

        if (!$plan->hasMedia('plan', ['from-user' => true])) {
            (new ImageService)->storeImage(
                model: $plan,
                image: $place->getFirstMediaUrl('place'),
                collection: 'plan'
            );
        }
        
        return response()->success(
            'planContent is added success',
            [
                "planContent" => new PlanContentResource($planContent),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/mobile/planContent/{id}/update",
     *    operationId="UpdatePlanContent",
     *    tags={"PlanContent"},
     *    summary="Edit PlanContent",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="PlanContent ID",
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
     *           @OA\Schema(ref="#/components/schemas/UpdatePlanContentRequest")
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
     *              example="planContent is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="planContent",
     *                 type="object",
     *                 ref="#/components/schemas/PlanContentResource"
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
    public function update(UpdatePlanContentRequest $request, PlanContent $planContent)
    {
        $planContent->update($request->validated());

        $place = Place::find($request->place_id);

        (new ImageService)->storeImage(
            model: $planContent->plan,
            image: $place->getFirstMediaUrl('place'),
            collection: 'plan'
        );
        return response()->success(
            'planContent is updated success',
            [
                "planContent" => new PlanContentResource($planContent),
            ]
        );
    }


    /**
     * @OA\Delete(
     *    path="/api/mobile/planContent/{id}/delete",
     *    operationId="DeletePlanContent",
     *    tags={"PlanContent"},
     *    summary="Delete PlanContent By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="PlanContent ID",
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
     *              example="planContent is deleted success"
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
    public function destroy(PlanContent $planContent)
    {
        $planContent->delete();

        return response()->success('planContent is deleted success');
    }
}
