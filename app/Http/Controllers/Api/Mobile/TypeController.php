<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\TypeResource;
use App\Models\Type;


class TypeController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/dashboard/type/index",
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
}
