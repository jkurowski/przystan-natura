<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;

use App\Models\Investment;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Page;
use App\Repositories\FloorRepository;
use Illuminate\Http\Request;

class InvestmentBuildingFloorController extends Controller
{
    private $repository;
    private $pageId;

    public function __construct(FloorRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 9;
    }

    public function index($slug, Building $building, Floor $floor, $floorSlug, Request $request)
    {
        $investment = Investment::findBySlug($slug);

        $page = Page::where('id', 9)->first();

        $investments = Investment::where('status', 1)
            ->when(in_array($investment->type, [1, 2]), function ($query) {
                $query->whereIn('type', [1, 2]);
            })
            ->when($investment->type == 3, function ($query) {
                $query->where('type', 3);
            })
            ->get(['id', 'type', 'name', 'slug']);

        $uniqueRooms = $this->repository->getUniqueRooms($floor->properties);

        $investment_room = $investment->load(array(
            'buildingRooms' => function($query) use ($building, $floor, $request)
            {
                $query->where('properties.floor_id', $floor->id);
                $query->where('properties.building_id', $building->id);

                $customOrder = [1, 3, 2, 4, 5, 6];
                $orderList = implode(',', $customOrder);
                $query->orderByRaw("FIELD(properties.type, $orderList)");
                $query->orderBy('properties.highlighted', 'DESC');
                $query->orderBy('properties.status', 'ASC');
                $query->orderBy('properties.number_order', 'ASC');

                if ($request->input('rooms')) {
                    $query->where('rooms', $request->input('rooms'));
                }
                if ($request->input('status')) {
                    $query->where('status', $request->input('status'));
                }

                if ($request->input('highlighted')) {
                    $query->where('highlighted', $request->input('highlighted'));
                }

                if ($request->input('price')) {
                    $area_param = explode('-', $request->input('price'));
                    $min = $area_param[0];
                    $max = $area_param[1];
                    $query->whereBetween('price_brutto', [$min, $max]);
                }

                if ($request->input('area')) {
                    $area_param = explode('-', $request->input('area'));
                    $min = $area_param[0];
                    $max = $area_param[1];
                    $query->whereBetween('area_search', [$min, $max]);
                }

                if ($request->input('sort')) {
                    $order_param = explode(':', $request->input('sort'));
                    $column = $order_param[0];
                    $direction = $order_param[1];
                    $query->orderBy($column, $direction);
                }
            },
            'building' => function($query) use ($building)
            {
                $query->where('id', $building->id);
            },
            'floor' => function($query) use ($floor)
            {
                $query->where('id', $floor->id);
            }
        ));

        return view('front.developro.investment_building_floor.index', [
            'page' => $page,
            'investment' => $investment_room,
            'investments' => $investments,
            'building' => $building,
            'floor' => $floor,
            'properties' => $investment->buildingRooms,
            'next_floor' => $floor->findNext($investment->id, $floor->position, $building->id),
            'prev_floor' => $floor->findPrev($investment->id, $floor->position, $building->id),
            'static_page' => 'plan-inwestycji',
            'uniqueRooms' => $uniqueRooms,
        ]);
    }

}
