<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel Trippo - Dashboard",
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
 * @OA\Tag(
 *     name="City",
 *     description="API Endpoints of City"
 * )
 *
 * @OA\PathItem(path="/api")
 * 
 *
 * 
 */

class DashboardController extends Controller
{
    //
}
