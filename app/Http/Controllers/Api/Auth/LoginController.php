<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\HttpStatusCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;

        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'status' => HttpStatusCode::HTTP_STATUS_CODE_UNAUTHORIZED,
                'message' => 'Tài khoản hoặc mật khẩu không đúng !!!'
            ]);
        }
        
        $user = JWTAuth::user();
        return response()->json([
            'status' => HttpStatusCode::HTTP_STATUS_OK,
            'message' => 'Successful',
            'token' => $token,
            'user_info' => $user

    ]);
    }

    public function checkToken()
    {
        return response()->json([
            'status' => HttpStatusCode::HTTP_STATUS_OK,
            'message' => 'Successful',
        ]);
    }

    public function logout()
    {
        $logout = auth()->logout();

        return response()->json([
            'status' => HttpStatusCode::HTTP_STATUS_OK,
            'message' => 'Successful',
        ]);
    }
}