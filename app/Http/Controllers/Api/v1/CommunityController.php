<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\Api\v1\CommunityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommunityController extends Controller
{
    //
    private $communityRepository;

    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    public function index()
    {
        return $this->success($this->communityRepository->getCommunityList()->toArray());
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        if (!$id) {
            return $this->error('id不可以为空');
        }
        $community = $this->communityRepository->getCommunityById($id);
        if (!$community) {
            return $this->error('社团不存在');
        }
        $community->isAttention = 0;
        $community->isSignIn = 0;
        if (auth('api')->check()) {
            $user = auth('api')->user();
            $communityUser = $this->communityRepository->findCommunityUser($user->id, $id);
            $communityUserSign = $this->communityRepository->findCommunityUserSign($user->id, $id);
            if ($communityUser) {
                $community->isAttention = 1;
            }
            if ($communityUserSign) {
                $community->isSignIn = 1;
            }
        }

        return $this->success($community->toArray());
    }

    public function attention(Request $request)
    {
        $communityId = $request->get('communityId');
        $user = $request->user('api');
        $communityUser = $this->communityRepository->findCommunityUser($user->id, $communityId);
        if ($communityUser) {
            return $this->error('你已经加入或者关注了这个社团');
        }
        $res = $this->communityRepository->payAttentionToCommunity($user->id, $communityId);
        return $this->success();
    }

    public function sign(Request $request)
    {
        $communityId = $request->get('communityId');
        $user = $request->user('api');
        $communityUser = $this->communityRepository->findCommunityUser($user->id, $communityId);
        if (!$communityUser) {
            return $this->error('你还未加入或者关注该社团');
        }
        $res = $this->communityRepository->signIn($user->id, $communityId);
        return $this->success();
    }

    public function getCommunityCategory()
    {
        return $this->success($this->communityRepository->getCommunityCategoryList()->toArray());
    }

    public function createCategory(Request $request)
    {
        $messages = [
            'communityName.required' => '社团名称不可以为空!',
            'communityDescription.required' => '社团描述不可以为空!',
            'category.required' => '社团分类不可以为空!',
            'logo.required' => '社团徽标不可以为空!',
        ];
        $validator = Validator::make($request->all(), [
            'communityName' => 'required',
            'communityDescription' => 'required',
            'category' => 'required',
            'logo' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return $this->error($validator->errors());
        }
        $community = $this->communityRepository->getCommunityByName($request->get('communityName'));
        if ($community) {
            $validator->errors()->add('communityName', '该社团已经存在');
            return $this->error('社团已经存在');
        }
        $communityName = $request->get('communityName');
        $category = $request->get('category');
        $description = $request->get('communityDescription');
        $data['community_name'] = $communityName;
        $data['description'] = $description;
        $data['school_id'] = $request->user('api')->school_id;
        $data['user_id'] = $request->user('api')->id;
        $data['community_logo'] = $request->get('logo');
        $this->communityRepository->createCommunity($data,$category);
        return $this->success();
    }
}
