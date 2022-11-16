<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headers = getallheaders();
        $Authorization = "";
        if (isset($headers['authorization'])) {
            $Authorization = $headers['authorization'];
        }
        if (isset($headers['Authorization'])) {
            $Authorization = $headers['Authorization'];
        }
        if ($Authorization != "") {
            try {
                $request->headers->set('Authorization', $Authorization);
                $user = JWTAuth::parseToken()->authenticate();
            } catch (Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                    return response()->json(['message' => 'Token is Invalid', 'status' => '0'], 500);
                } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                    return response()->json(['message' => 'Token is Expired', 'status' => '0'], 500);
                } else {
                    return response()->json(['message' => 'Authorization Token not found', 'status' => '0'], 500);
                }
            }
            $request->user_id = $user['id'];
        }


        //$input = $request->all();
        //   $request->user=$user;

        return $next($request);
    }
}
