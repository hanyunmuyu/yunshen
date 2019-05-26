<?php
/**
 * Created by 莘莘
 * User: 寒云
 * Email: 1355081829@qq.com
 * Date: 2019/5/26
 * Time: 16:47
 */

namespace App\Repositories\Api\v1;


use App\User;

class UserRepository
{
    public function getUserList()
    {
        return User::orderby('id', 'desc')
            ->paginate();
    }
}
