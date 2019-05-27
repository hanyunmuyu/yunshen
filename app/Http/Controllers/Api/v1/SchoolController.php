<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\Api\v1\CommunityRepository;
use App\Repositories\Api\v1\SchoolRepository;
use App\Repositories\Api\v1\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    //
    private $schoolRepository;
    private $communityRepository;
    private $userRepository;

    public function __construct
    (
        SchoolRepository $schoolRepository,
        CommunityRepository $communityRepository,
        UserRepository $userRepository
    )
    {
        $this->schoolRepository = $schoolRepository;
        $this->communityRepository = $communityRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->success($this->schoolRepository->getSchoolList()->toArray());
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        if (!$id) {
            return $this->error('id不为空');
        }
        $school = $this->schoolRepository->getSchoolById($id);
        return $this->success($school->toArray());
    }

    public function communityList(Request $request)
    {
        $id = $request->get('schoolId');
        if (!$id) {
            return $this->error('schoolId不可以为空');
        }
        $school = $this->schoolRepository->getSchoolById($id);
        if (!$school) {
            return $this->error('校园不存在');
        }
        return $this->success($this->communityRepository->getCommunityListBySchoolId($id)->toArray());
    }

    public function studentList(Request $request)
    {
        $schoolId = $request->get('schoolId');
        if (!$schoolId) {
            $school = $this->schoolRepository->getSchoolById($schoolId);
            if (!$school) {
                return $this->error('校园不存在');
            }
        }
        return $this->success($this->userRepository->getSchoolUserList($schoolId)->toArray());
    }
}
