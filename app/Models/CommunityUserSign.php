<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityUserSign extends Model
{
    //
    protected $fillable = [
        'user_id',
        'community_id',
    ];
}
