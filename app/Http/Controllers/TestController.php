<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Class constructor.
     */
    public function message(Request $request)
    {
        event(new Message($request->input('message'), $request->input('userName')));
        
        return [];
    }
}
