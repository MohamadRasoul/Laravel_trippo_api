<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Admin;

use App\Services\ImageService;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;


class AdminController extends Controller
{
    // /**
    //  * @OA\Get(
    //  *    path="/api/dashboard/admin/index",
    //  *    operationId="IndexAdmin",
    //  *    tags={"Admin"},
    //  *    summary="Get All Admins",
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
    //  *              example="this is all admins"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="admins",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/AdminResource"
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
        $admins = Admin::orderBy('id');

        return response()->success(
            'this is all Admins',
            [
                "admins" => AdminResource::collection($admins->paginate(request()->perPage ?? $admins->count())),
            ]
        );
    }


    // /**
    //  * @OA\Post(
    //  *    path="/api/dashboard/admin/store",
    //  *    operationId="StoreAdmin",
    //  *    tags={"Admin"},
    //  *    summary="Add Admin",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\RequestBody(
    //  *        required=true,
    //  *        @OA\MediaType(mediaType="application/json",
    //  *           @OA\Schema(ref="#/components/schemas/StoreAdminRequest")
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
    //  *              example="admin is added success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="admin",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/AdminResource"
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
    public function store(StoreAdminRequest $request)
    {
         $admin = Admin::create($request->validated());

        (new ImageService)->storeImage(
            model: $admin,
            image: $request->image,
            collection: 'admin'
        );

        return response()->success(
            'admin is added success',
            [
                "admin" => new AdminResource($admin),
            ]
        );
    }


    // /**
    //  * @OA\Get(
    //  *    path="/api/dashboard/admin/{id}/show",
    //  *    operationId="ShowAdmin",
    //  *    tags={"Admin"},
    //  *    summary="Get Admin By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="Admin ID",
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
    //  *              example="this is your admin"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *                 @OA\Property(
    //  *                 property="admin",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/AdminResource"
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
    public function show(Admin $admin)
    {
        return response()->success(
            'this is your admin',
            [
                "admin" => new AdminResource($admin),
            ]
        );
    }


    // /**
    //  * @OA\Post(
    //  *    path="/api/dashboard/admin/{id}/update",
    //  *    operationId="UpdateAdmin",
    //  *    tags={"Admin"},
    //  *    summary="Edit Admin",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *       name="id",
    //  *       example=1,
    //  *       in="path",
    //  *       description="Admin ID",
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
    //  *           @OA\Schema(ref="#/components/schemas/UpdateAdminRequest")
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
    //  *              example="admin is updated success"
    //  *           ),
    //  *           @OA\Property(
    //  *              property="data",
    //  *              @OA\Property(
    //  *                 property="admin",
    //  *                 type="object",
    //  *                 ref="#/components/schemas/AdminResource"
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
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
         $admin->update($request->validated());

        (new ImageService)->storeImage(
            model: $admin,
            image: $request->image,
            collection: 'admin'
        );

        return response()->success(
            'admin is updated success',
            [
                "admin" => new AdminResource($admin),
            ]
        );
    }

    // /**
    //  * @OA\Delete(
    //  *    path="/api/dashboard/admin/{id}/delete",
    //  *    operationId="DeleteAdmin",
    //  *    tags={"Admin"},
    //  *    summary="Delete Admin By ID",
    //  *    description="",
    //  *    security={{"bearerToken":{}}},
    //  *
    //  *
    //  *
    //  *    @OA\Parameter(
    //  *        name="id",
    //  *        example=1,
    //  *        in="path",
    //  *        description="Admin ID",
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
    //  *              example="admin is deleted success"
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
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->success('admin is deleted success');
    }
}
