<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\Api\v1\SchoolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    //
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
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
}
