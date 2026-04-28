<?php namespace App\Repositories;

use App\Models\CharityActivity;

class CharityRepository extends BaseRepository
{
    protected $model;

    public function __construct(CharityActivity $model)
    {
        parent::__construct($model);
    }
}
