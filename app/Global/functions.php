<?php

use App\Helpers\ContentMail;

function exceptionCustom($message, $code)
{
    throw new \App\Exceptions\Exception($message, $code);
}

function exceptionFailSucces($message, $success = 0)
{
    throw new \App\Exceptions\ExceptionFailSucces($message, $success);
}