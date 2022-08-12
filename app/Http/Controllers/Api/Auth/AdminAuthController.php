<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Resources\Auth\AdminResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin_api', ['except' => ['login', 'register']]);
    }

    /**
     * @OA\Post(
     *    path="/api/auth/admin/register",
     *    operationId="RegisterAdmin",
     *    tags={"Admin"},
     *    summary="Register Admin",
     *    description="",
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/RegisterAdminRequest")
     *       )
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
     *              example="admin register successfully"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                    property="admin",
     *                    type="object",
     *                    ref="#/components/schemas/AdminResource"
     *                ),
     *                 @OA\Property(
     *                    property="token",
     *                    type="string",
     *                    example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTkyLjE2OC4xMzcuMTo1MDAwL2FwaS9hdXRoL3VzZXIvcmVnaXN0ZXIiLCJpYXQiOjE2NTM3NTU5NDgsImV4cCI6MTY1Mzc1OTU0OCwibmJmIjoxNjUzNzU1OTQ4LCJqdGkiOiJvc3gzS3BLR3ZDUWZ0dTZwIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.tD0FIsUJx33V0J4g4_qSl3cG2JWHstuvy1FkfhmrXiQ",
     *                ),
     *           )
     *        ),
     *     ),
     *
     * )
     */

    public function register(RegisterAdminRequest $request)
    {
        $admin = Admin::create($request->validated());

        $token = Auth::guard('admin_api')->login($admin);

        return response()->success(
            'admin register successfully',
            [
                'admin' => new AdminResource($admin),
                'token' => $token,
            ]
        );
    }

    /**
     * @OA\Post(
     *    path="/api/auth/admin/login",
     *    operationId="LoginAdmin",
     *    tags={"Admin"},
     *    summary="Login Admin",
     *    description="",
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/LoginAdminRequest")
     *       )
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
     *              example="admin login successfully"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                    property="admin",
     *                    type="object",
     *                    ref="#/components/schemas/AdminResource"
     *                ),
     *                 @OA\Property(
     *                    property="token",
     *                    type="string",
     *                    example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTkyLjE2OC4xMzcuMTo1MDAwL2FwaS9hdXRoL3VzZXIvcmVnaXN0ZXIiLCJpYXQiOjE2NTM3NTU5NDgsImV4cCI6MTY1Mzc1OTU0OCwibmJmIjoxNjUzNzU1OTQ4LCJqdGkiOiJvc3gzS3BLR3ZDUWZ0dTZwIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.tD0FIsUJx33V0J4g4_qSl3cG2JWHstuvy1FkfhmrXiQ",
     *                ),
     *           )
     *        ),
     *     ),
     *
     * )
     */
    public function login(LoginAdminRequest $request)
    {
        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('username')]);
        $token = Auth::guard('admin_api')->attempt($request->only($field, 'password'));
        if (!$token) {
            return response()->error('Unauthorized', 401);
        }

        $admin = Auth::guard('admin_api')->user();

        return response()->success(
            'admin login successfully',
            [
                'admin' => $admin,
                'token' => $token,
            ]
        );
    }

    /**
     * @OA\Post(
     *    path="/api/auth/admin/logout",
     *    operationId="logoutAdmin",
     *    tags={"Admin"},
     *    summary="logout Admin",
     *    description="",
     *   security={{"bearerToken":{}}},
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
     *              example="admin logout successfully"
     *           ),
     *           @OA\Property(
     *              property="data",
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
    public function logout()
    {
        Auth::guard('admin_api')->logout();


        return response()->success('admin logout successfully');
    }


    public function refresh()
    {
        return response()->success(
            'refresh token successfuly',
            [
                'admin' => Auth::guard('admin_api')->user(),
                'token' => Auth::guard('admin_api')->refresh(),
            ]
        );
    }
}
