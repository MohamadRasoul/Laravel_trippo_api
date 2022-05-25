<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\VisitType;

use App\Services\ImageService;
use App\Http\Requests\StoreVisitTypeRequest;
use App\Http\Requests\UpdateVisitTypeRequest;


class VisitTypeController extends Controller
{
    // /** 
    //  * @OA\Get(
    //  *    path="/api/visitType/index",
    //  *    operationId="IndexVisitType",
    //  *    tags={"VisitType"},
    //  *    summary="Get All VisitTypes",
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
    //  *              example="this is all visitTypes"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="visitTypes",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/VisitTypeResource"
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
        $visitTypes = VisitType::orderBy('id');

        return response()->success(
            'this is all VisitTypes',
            [
                "visitTypes" => VisitTypeResource::collection($visitTypes->paginate(request()->perPage ?? $visitTypes->count())),
            ]
        );
    }

    
    // /** 
    //  * @OA\Post(
    //  *    path="/api/visitType/store",
    //  *    operationId="StoreVisitType",
    //  *    tags={"VisitType"},
    //  *    summary="Add VisitType",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\RequestBody(
    //  *        required=true,
    //  *        @OA\MediaType(mediaType="application/json",
    //  *           @OA\Schema(ref="#/components/schemas/StoreVisitTypeRequest")
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
    //  *              example="visitType is added success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="visitType",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/VisitTypeResource"
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
    public function store(StoreVisitTypeRequest $request)
    {
         $visitType = VisitType::create($request->validated());

        (new ImageService)->storeImage(
            model: $visitType,
            image: $request->image,
            collection: 'visitType'
        );

        return response()->success(
            'visitType is added success',
            [
                "visitType" => new VisitTypeResource($visitType),
            ]
        );
    }

    
    // /** 
    //  * @OA\Get(
    //  *    path="/api/visitType/{id}/show",
    //  *    operationId="ShowVisitType",
    //  *    tags={"VisitType"},
    //  *    summary="Get VisitType By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="VisitType ID",
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
    //  *              example="this is your visitType"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="visitType",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/VisitTypeResource"
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
    public function show(VisitType $visitType)
    {
        return response()->success(
            'this is your visitType',
            [
                "visitType" => new VisitTypeResource($visitType),
            ]
        );
    }

   
    // /** 
    //  * @OA\Post(
    //  *    path="/api/visitType/{id}/update",
    //  *    operationId="UpdateVisitType",
    //  *    tags={"VisitType"},
    //  *    summary="Edit VisitType",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *       name="id",
    //  *       example=1,
    //  *       in="path",
    //  *       description="VisitType ID",
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
    //  *           @OA\Schema(ref="#/components/schemas/UpdateVisitTypeRequest")
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
    //  *              example="visitType is updated success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="visitType",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/VisitTypeResource"
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
    public function update(UpdateVisitTypeRequest $request, VisitType $visitType)
    {
         $visitType->update($request->validated());

        (new ImageService)->storeImage(
            model: $visitType,
            image: $request->image,
            collection: 'visitType'
        );

        return response()->success(
            'visitType is updated success',
            [
                "visitType" => new VisitTypeResource($visitType),
            ]
        );
    }

    // /** 
    //  * @OA\Delete(
    //  *    path="/api/visitType/{id}/delete",
    //  *    operationId="DeleteVisitType",
    //  *    tags={"VisitType"},
    //  *    summary="Delete VisitType By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="VisitType ID",
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
    //  *              example="visitType is deleted success"
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
    public function destroy(VisitType $visitType)
    {
        $visitType->delete();

        return response()->success('visitType is deleted success');
    }
}
