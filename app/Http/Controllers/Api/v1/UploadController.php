<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
    public function upload(Request $request)
    {
        $data = [];
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatar = $file->store('avatar/' . date("Y-m-d"), 'public');
            $data['avatar'] = asset('storage/' . $avatar);
            $data['path'] = $avatar;
            return $this->success($data);
        } else {
            return $this->error();
        }
    }
}
