<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Resources\Dashboard\OptionResource;
use App\Models\Option;
use App\Models\Type;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class OptionController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/dashboard/option/index",
     *    operationId="IndexOption",
     *    tags={"Option"},
     *    summary="Get All Options",
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
     *@OA\Parameter(
     *        name="filter[type_id]",
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
     *              example="this is all options"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="options",
     *                 type="array",
     *                 @OA\Items(
     *                    type="object",
     *                    ref="#/components/schemas/OptionResource"
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
        $options = QueryBuilder::for(Option::orderBy('id'))
            ->allowedFilters([AllowedFilter::exact('type_id')]);

        return response()->success(
            'this is all Options',
            [
                "options" => OptionResource::collection($options->paginate(request()->perPage ?? $options->count())),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/dashboard/option/type/{typeId}/store",
     *    operationId="StoreOption",
     *    tags={"Option"},
     *    summary="Add Option",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *    @OA\Parameter(
     *        name="typeId",
     *        example=1,
     *        in="path",
     *        description="Type ID",
     *        required=true,
     *        @OA\Schema(
     *           type="integer"
     *        )
     *    ),
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StoreOptionRequest")
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
     *              example="option is added success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                 property="option",
     *                 type="object",
     *                 ref="#/components/schemas/OptionResource"
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
    public function store(StoreOptionRequest $request, Type $type)
    {
        $option = $type->options()->create($request->validated());

        return response()->success(
            'option is added success',

            [
                "option" => new OptionResource($option),
            ]
        );
    }


    /**
     * @OA\Post(
     *    path="/api/dashboard/option/{id}/update",
     *    operationId="UpdateOption",
     *    tags={"Option"},
     *    summary="Edit Option",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *       name="id",
     *       example=1,
     *       in="path",
     *       description="Option ID",
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
     *           @OA\Schema(ref="#/components/schemas/UpdateOptionRequest")
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
     *              example="option is updated success"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="option",
     *                 type="object",
     *                 ref="#/components/schemas/OptionResource"
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
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->validated());

        return response()->success(
            'option is updated success',
            [
                "option" => new OptionResource($option),
            ]
        );
    }

    /**
     * @OA\Delete(
     *    path="/api/dashboard/option/{id}/delete",
     *    operationId="DeleteOption",
     *    tags={"Option"},
     *    summary="Delete Option By ID",
     *    description="",
     *    security={{"bearerToken":{}}},
     *
     *
     *
     *    @OA\Parameter(
     *        name="id",
     *        example=1,
     *        in="path",
     *        description="Option ID",
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
     *              example="option is deleted success"
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
    public function destroy(Option $option)
    {
        $option->delete();

        return response()->success('option is deleted success');
    }
}
