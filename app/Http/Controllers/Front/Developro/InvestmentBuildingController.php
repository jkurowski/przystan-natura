<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\BuildingRepository;
use Illuminate\Http\Request;

use App\Models\Building;
use App\Models\Investment;

class InvestmentBuildingController extends Controller
{
    private $repository;
    private $pageId;

    public function __construct(BuildingRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 9;
    }

    public function index($slug, Building $building, Request $request)
    {
        $investment = Investment::findBySlug($slug);
        $uniqueRooms = $this->repository->getUniqueRooms($building->properties);

        $investment_room = $investment->load(array(
            'buildingRooms' => function($query) use ($building, $request)
            {
                $query->where('properties.building_id', $building->id);
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

                $query->where('properties.type', 1);
            },
            'buildingFloors' => function($query) use ($building)
            {
                $query->where('building_id', $building->id);
            }
        ));

        $page = Page::where('id', 9)->first();
        $investments = Investment::where('status', 1)
            ->when(in_array($investment->type, [1, 2]), function ($query) {
                $query->whereIn('type', [1, 2]);
            })
            ->when($investment->type == 3, function ($query) {
                $query->where('type', 3);
            })
            ->get(['id', 'type', 'name', 'slug']);

        return view('front.developro.investment_building.index', [
            'investment' => $investment_room,
            'investments' => $investments,
            'building' => $building,
            'properties' => $investment->buildingRooms,
            'page' => $page,
            'prev_building' => $building->findPrev($investment->id, $building->id),
            'next_building' => $building->findNext($investment->id, $building->id),
            'static_page' => 'plan-inwestycji',
            'uniqueRooms' => $uniqueRooms
        ]);
    }

    public function show($id)
    {
        //
    }
}
