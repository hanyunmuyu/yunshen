<?php

namespace App\Http\Controllers\Api\v1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        $userName = $request->get('username');
        $confirmPassword = $request->get('confirmPassword');
        $password = $request->get('password');
        $user = User::where('name', $userName)->first();
        if ($user) {
            return $this->error();
        } else {
            $data['name'] = $userName;
            $pass = encrypt($password);
            $data['password'] = $pass;
            $user = User::create($data);
            return $this->success($user->toArray());
        }
    }
}
