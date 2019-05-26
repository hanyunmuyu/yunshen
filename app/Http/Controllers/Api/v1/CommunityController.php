<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\Api\v1\CommunityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return $this->success($community->toArray());
    }
}
