<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    public function getSchoolLogoAttribute($logo)
    {
        return asset('storage/'.$logo);
    }
}
