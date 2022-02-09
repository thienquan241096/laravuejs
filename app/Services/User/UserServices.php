<?php

namespace App\Services\User;

use App\Services\BaseService;
use Tymon\JWTAuth\JWTAuth;

class UserServices extends BaseService
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    public function login($request)
    {
        
    }
}   