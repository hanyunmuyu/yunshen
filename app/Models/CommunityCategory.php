<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityCategory extends Model
{
    //
    protected $fillable = [
        'category_id',
        'community_id',
    ];
}
