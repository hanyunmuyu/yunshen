<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\Api\v1\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->success($this->userRepository->getUserList()->toArray());
    }
}
