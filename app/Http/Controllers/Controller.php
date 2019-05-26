<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function success($data = [], $msg = "成功！", $code = 200, $status = 'success')
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'msg' => $msg,
            'data' => $this->delNull($data),
        ]);
    }

    public function error($msg = "失败！", $code = 400, $status = 'error')
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'msg' => $msg
        ]);

    }

    private function delNull($arr)
    {
        if (is_array($arr)) {
            $tmp = [];
            foreach ($arr as $key => $value) {
                if (is_array($value)) {
                    $tmp[$this->convertUnderline($key)] = $this->delNull($value);
                } else {
                    $tmp[$this->convertUnderline($key)] = $value ?? '';
                }
            }

            return $tmp;
        } else {
            return $this->convertUnderline($arr);
        }
    }

    public function formatPaginate($paginate)
    {
        $data = [];
        $paginate = $paginate->toArray();
        $data['currentPage'] = $paginate['current_page'];
        $data['totalPage'] = $paginate['last_page'];
        $data['data'] = $paginate['data'];
        return $data;
    }

    private function convertUnderline($str)
    {
        $str = preg_replace_callback('/([-_]+([a-zA-Z]{1}))/i', function ($matches) {
            return strtoupper($matches[2]);
        }, $str);
        return $str;
    }
}
