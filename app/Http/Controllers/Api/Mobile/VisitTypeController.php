<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;

use App\Models\VisitType;

use App\Services\ImageService;
use App\Http\Requests\StoreVisitTypeRequest;
use App\Http\Requests\UpdateVisitTypeRequest;
use App\Http\Resources\Mobile\VisitTypeResource;

class VisitTypeController extends Controller
{
    /**
     * @OA\Get(
     *    path="/api/mobile/visitType/index",
     *    operationId="IndexVisitType",
     *    tags={"VisitType"},
     *    summary="Get All VisitTypes",
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
     *              example="this is all visitTypes"
     *           ),
     *           @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                 property="visitTypes",
     *                 type="object",
     *                 ref="#/components/schemas/VisitTypeResource"
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
        $visitTypes = VisitType::orderBy('id');

        return response()->success(
            'this is all VisitTypes',
            [
                "visitTypes" => VisitTypeResource::collection($visitTypes->paginate(request()->perPage ?? $visitTypes->count())),
            ]
        );
    }
}
