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
}
