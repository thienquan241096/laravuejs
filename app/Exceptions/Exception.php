<?php

namespace App\Exceptions;

use Exception as DefaultException;

class Exception extends DefaultException
{
    public function render($request){
        return $request->getMessage();
        // return response()->view('test');
    }

    public function report()
    {
        return false;
    }
}
