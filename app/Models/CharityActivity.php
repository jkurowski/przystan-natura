<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharityActivity extends Model
{

    protected $table = 'charity_activities';

    protected $fillable = [
        'title',
        'intro',
        'image',
        'image_alt',
        'sort',
    ];
}
