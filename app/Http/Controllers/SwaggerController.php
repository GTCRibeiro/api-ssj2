<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="TDI API",
 * )
 */
/**
 * @OA\Server(
 *      url="http://tdi-api.test:81/api",
 *      description="L5 Swagger OpenApi Server",
 * )
 */
/**
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
 *     name="Password Based",
 *     in="header",
 *     scheme="https",
 *     securityScheme="Password Based",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="/oauth/authorize",
 *         tokenUrl="/oauth/token",
 *         refreshUrl="/oauth/token/refresh",
 *         scopes={}
 *     )
 * )
 */

class SwaggerController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response([
            'status'=> 200,
            'data' => $users,
            'msg' => ("All okay")
        ]);
    }
}
