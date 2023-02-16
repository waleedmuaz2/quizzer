<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

use Illuminate\Support\Facades\Log;

class ApiMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if( !$user ) throw new Exception('User Not Found');
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                $message="Token Invalid";
                return jsonFormat(false,[],$message,498);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                $message="Token Expired";
                return jsonFormat(false,[],$message,401);
            }
            else{
                if( $e->getMessage() === 'User Not Found') {
                    return jsonFormat(false,[],"User Not Found",400);
                }elseif ($e->getMessage() === "Please verify your email") {
                    return jsonFormat(false,[],"Please verify your email",403);
                }
                    return jsonFormat(false,[],"Authorization Token not found",401);

            }
        }
        return $next($request);
    }
}
