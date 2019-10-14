<?php

namespace App\Http\Controllers;

use App\Common\ResponseCode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseCode;

    public function apiSend($msg = '暂无数据', $data = null, $code = null)
    {
        //
    }
}
