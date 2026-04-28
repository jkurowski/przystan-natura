<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentSelectfield extends Model
{
    protected $fillable = ['category','type','label','value','sort'];
}
