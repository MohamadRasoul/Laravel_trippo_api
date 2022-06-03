<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user_api', ['except' => ['login', 'register']]);
    }

    /**
     * @OA\Post(
     *    path="/api/auth/user/register",
     *    operationId="RegisterUser",
     *    tags={"User"},
     *    summary="Register User",
     *    description="",
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/RegisterUserRequest")
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
     *              example="user register successfully"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                    property="user",
     *                    type="object",
     *                    ref="#/components/schemas/UserResource"
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

    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());

        $token = Auth::guard('user_api')->login($user);

        return response()->success(
            'user register successfully',
            [
                'user' => new UserResource($user),
                'token' => $token,
            ]
        );
    }

    /**
     * @OA\Post(
     *    path="/api/auth/user/login",
     *    operationId="LoginUser",
     *    tags={"User"},
     *    summary="Login User",
     *    description="",
     *
     *
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/LoginUserRequest")
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
     *              example="user login successfully"
     *           ),
     *           @OA\Property(
     *              property="data",
     *                 @OA\Property(
     *                    property="user",
     *                    type="object",
     *                    ref="#/components/schemas/UserResource"
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
    public function login(LoginUserRequest $request)
    {

        $token = Auth::guard('user_api')->attempt($request->validated());
        if (!$token) {
            return response()->error('Unauthorized', 401);
        }

        $user = Auth::guard('user_api')->user();

        return response()->success('user login successfully',
            [
                'user' => $user,
                'token' => $token,
            ]);
    }
    /**
     * @OA\Post(
     *    path="/api/auth/user/logout",
     *    operationId="logoutUser",
     *    tags={"User"},
     *    summary="logout User",
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
     *              example="user logout successfully"
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
        Auth::guard('user_api')->logout();


        return response()->success('user logout successfully');
    }


    public function refresh()
    {
        return response()->success(
            'refresh token successfuly',
            [
                'user' => Auth::guard('user_api')->user(),
                'token' => Auth::guard('user_api')->refresh(),
            ]
        );
    }
}
