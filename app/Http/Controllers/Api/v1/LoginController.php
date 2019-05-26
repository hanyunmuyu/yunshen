<?php

namespace App\Http\Controllers\Api\v1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $userName = $request->get('username');
        $password = $request->get('password');
        $user = User::where('name', $userName)->first();
        if ($user) {
            try {
                if (decrypt($user->password) != $password) {
                    return $this->error('密码错误');
                } else {
                    $user->api_token = md5(microtime());
                    $user->save();
                    return $this->success($user->toArray());
                }
            } catch (\Exception $exception) {
                return $this->error('密码错误');
            }
        } else {
            return $this->error('用户不存在');
        }
    }
}
