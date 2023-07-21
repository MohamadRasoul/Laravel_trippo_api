<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel Trippo - Auth",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="mralmaahlol@gmail.com"
 *      ),
 *
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 *
 * @OA\Tag(
 *     name="Image",
 *     description="API Endpoints of City"
 * )
 *
 * @OA\Tag(
 *     name="User",
 *     description="API Endpoints of City"
 * )
 *
 * @OA\Tag(
 *     name="Admin",
 *     description="API Endpoints of City"
 * )
 *
 * @OA\PathItem(path="/api")
 *
 *
 *
 */

class AuthController extends Controller
{
    //
}
