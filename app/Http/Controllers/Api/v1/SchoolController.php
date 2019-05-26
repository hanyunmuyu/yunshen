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
}
