<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseNotPermission($messages){
        return response()->json([
            'message' => $messages,
        ], HTTP_STATUS_CODE_FORBIDDEN);
    }

    /**
     * Resource response
     * @param  array $data
     * @param int $status_code
     * @return json
     */
    protected function response($data = [], $status_code = HTTP_STATUS_OK){
        if(!isset($data['success'])) $data['success'] = RES_SUCCESS;
        return response()->json([
            'data' => $data,
        ], $status_code);
    }

    /**
     * Resource response for service
     * @param  array $data
     * @return json
     */
    protected function responseService($data = []){
        if(!isset($data['data']) || !isset($data['status_code'])){
            throw new \ErrorException(myTrans('Hàm responseService yêu cầu có 2 key data và status_code'));
        }

        if(!is_numeric($data['status_code'])){
            throw new \ErrorException(myTrans('Status_code chỉ nhận số'));
        }

        return $this->response($data['data'], $data['status_code']);
    }
}
