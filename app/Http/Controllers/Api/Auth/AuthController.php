<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
 *
 * @OA\Server(
 *      url="http://localhost:8000",
 *      description="Test Server"
 * )
 *
 * @OA\Server(
 *      url="https://trippo-dzvz4dla0-mralmaahlol-gmailcom.vercel.app",
 *      description="Test Server"
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
