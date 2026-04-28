<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentAdvantage extends Model
{

    protected $fillable = [
        'investment_id',
        'title',
        'subtitle',
        'image',
        'image_title',
        'position',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
