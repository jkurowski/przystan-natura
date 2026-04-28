<?php namespace App\Repositories;

use App\Models\Building;

class BuildingRepository extends BaseRepository
{
    protected $model;

    public function __construct(Building $model)
    {
        parent::__construct($model);
    }

    public function getUniqueRooms(object $query)
    {
        return $query->filter(fn($item) => $item->rooms > 0)->sortBy('rooms')->unique('rooms')->pluck('rooms');
    }
}
