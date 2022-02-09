<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class VerifyJWTToken
{
    protected $auth;
    /**
     * Class constructor.
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $this->auth->parseToken()->authenticate();
        } catch (JWTException $th) {
            return response()->json([
                'code'     => HTTP_STATUS_CODE_UNAUTHORIZED,
                'message' => 'Token không hợp lệ hoặc hết hạn',
            ]);
        }
        return $next($request);
    }
}
