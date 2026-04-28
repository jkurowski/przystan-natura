<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentStage extends Model
{
    protected $fillable = [
        'investment_id',
        'name',
        'date',
        'percent',
        'content',
        'position',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
