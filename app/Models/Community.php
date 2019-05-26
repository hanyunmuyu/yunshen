<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    protected $fillable = [
        'community_name',
        'level',
        'vip',
        'school_id',
        'user_id',
        'description',
        'community_logo',
        'deal_reason',
        'status',

    ];

    public function getCommunityLogoAttribute($logo)
    {
        return asset('storage/' . $logo);
    }
}
