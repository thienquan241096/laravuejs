<?php

namespace App\Services;

class BaseService
{
    /**
     * response succes api
     */
    public function responseSuccessApi(array $data = [], int $status = HTTP_STATUS_OK)
    {
        if(!isset($data['success'])) $data['success'] = 1;
        return [
            'data' => $data,
            'status_code' => $status
        ];
    }

    /**
     * response error exception
     */
    public function exception($message, int $status_code): void
    {
        exceptionCustom($message, $status_code);
    }

    /**
     *  response failed succes api
     */
    public function responseSuccessFailedApi($message, int $success = RES_FAILD): void
    {
        exceptionFailSucces($message, $success);
    }
}