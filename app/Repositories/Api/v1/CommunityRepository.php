<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/18
 * Time: 21:32
 */

namespace App\Repositories\Api\v1;

use App\Models\Category;
use App\Models\Community;
use App\Models\CommunityCategory;
use App\Models\CommunityUser;
use App\Models\CommunityUserSign;

class CommunityRepository
{
    public function getCommunityList()
    {
        return Community::orderBy('id', 'desc')
            ->paginate();
    }

    public function getCommunityById($communityId)
    {
        return Community::find($communityId);
    }
    public function getCommunityByName($communityName)
    {
        return Community::where('community_name',$communityName)->first();
    }

    public function payAttentionToCommunity($userId, $communityId)
    {
        $data['user_id'] = $userId;
        $data['community_id'] = $communityId;
        return CommunityUser::create($data);
    }

    public function findCommunityUser($userId, $communityId)
    {
        $data['user_id'] = $userId;
        $data['community_id'] = $communityId;
        return CommunityUser::where($data)->first();
    }

    public function signIn($userId, $communityId)
    {
        $data['user_id'] = $userId;
        $data['community_id'] = $communityId;
        return CommunityUserSign::create($data);
    }

    public function findCommunityUserSign($userId, $communityId)
    {
        $data['user_id'] = $userId;
        $data['community_id'] = $communityId;
        return CommunityUserSign::where($data)
            ->whereDate('updated_at', date('Y-m-d'))
            ->first();
    }

    public function getCommunityListBySchoolId($schoolId)
    {
        return Community::where('school_id',$schoolId)
            ->paginate();
    }

    public function getCommunityCategoryList()
    {
        return Category::all();
    }

    public function createCommunity($data,$category)
    {
        $community = Community::firstOrCreate($data);
        if ($community) {
            foreach ($category as $cat) {
                $tmp = [];
                $tmp['community_id'] = $community->id;
                $tmp['category_id'] = $cat;
                CommunityCategory::firstOrCreate($tmp);
            }
        }
    }
}
