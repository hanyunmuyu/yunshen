<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/18
 * Time: 21:32
 */

namespace App\Repositories\Api\v1;

use App\Models\Community;

class CommunityRepository
{
    public function getCommunityList()
    {
        return Community::orderBy('id', 'desc')
            ->paginate();
    }

}
