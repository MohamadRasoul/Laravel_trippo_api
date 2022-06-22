<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Resources\Dashboard\TypeResource;
use App\Models\Type;
use App\Services\ImageService;


class TypeController extends Controller
{
    /**
     * @OA\Get(
     *    path="/Api/dashboard/type/index",
     *    operationId="IndexType",
     *    tags={"Type"},
     *    summary="Get All Types",
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
     *              example="this is all types"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="types",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/TypeResource"
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
        $types = Type::orderBy('id');

        return response()->success(
            'this is all Types',
            [
                "types" => TypeResource::collection($types->paginate(request()->perPage ?? $types->count())),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/Api/dashboard/type/store",
     *    operationId="StoreType",
     *    tags={"Type"},
     *    summary="Add Type",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreTypeRequest")
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
     *              example="type is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="type",
     *                 type="object",
     *                 ref="#/components/schemas/TypeResource"
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
    public function store(StoreTypeRequest $request)
    {
        $type = Type::create($request->validated());

        (new ImageService)->storeImage(
            model: $type,
            image: $request->image,
            collection: 'type'
        );

        return response()->success(
            'type is added success',
            [
                "type" => new TypeResource($type),
            ]
        );
    }


    /**
     * @OA\Get(
     *    path="/Api/dashboard/type/{id}/show",
     *    operationId="ShowType",
     *    tags={"Type"},
     *    summary="Get Type By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Type ID",
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
     *              example="this is your type"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="type",
     *                 type="object",
     *                 ref="#/components/schemas/TypeResource"
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
    public function show(Type $type)
    {
        return response()->success(
            'this is your type',
            [
                "type" => new TypeResource($type),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/Api/dashboard/type/{id}/update",
     *    operationId="UpdateType",
     *    tags={"Type"},
     *    summary="Edit Type",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="Type ID",
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
     *           @OA\Schema(ref="#/components/schemas/UpdateTypeRequest")
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
     *              example="type is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="type",
     *                 type="object",
     *                 ref="#/components/schemas/TypeResource"
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
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->validated());

        (new ImageService)->storeImage(
            model: $type,
            image: $request->image,
            collection: 'type'
        );

        return response()->success(
            'type is updated success',
            [
                "type" => new TypeResource($type),
            ]
        );
    }

    /**
     * @OA\Delete(
     *    path="/Api/dashboard/type/{id}/delete",
     *    operationId="DeleteType",
     *    tags={"Type"},
     *    summary="Delete Type By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Type ID",
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
     *              example="type is deleted success"
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
    public function destroy(Type $type)
    {
        $type->delete();

        return response()->success('type is deleted success');
    }
}
