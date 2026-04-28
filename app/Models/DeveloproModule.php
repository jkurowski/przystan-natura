<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeveloproModule extends Model
{
    protected $table = 'developro_modules';

    protected $fillable = [
        'name',
        'url',
        'active',
    ];
}
