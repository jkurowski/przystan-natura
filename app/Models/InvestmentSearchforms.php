<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentSearchforms extends Model
{
    protected $fillable = ['name','active','sort'];
    public $timestamps = false;
}
