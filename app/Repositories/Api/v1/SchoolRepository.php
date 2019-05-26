<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 18:13
 */

namespace App\Repositories\Api\v1;


use App\Models\School;
use App\Models\SchoolUser;

class SchoolRepository
{
    public function getSchoolList()
    {
        return School::orderby('id', 'asc')->paginate();
    }

    public function getSchoolAll()
    {
        return School::select('school_name','province','city','id')->get();
    }
    public function getSchoolById($schoolId)
    {
        return School::find($schoolId);
    }
}
