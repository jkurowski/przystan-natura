<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Investment;
use App\Models\Page;
use App\Repositories\FloorRepository;
use Illuminate\Http\Request;

// CMS

class InvestmentFloorController extends Controller
{
    private $repository;
    private $pageId;

    public function __construct(FloorRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 9;
    }

    public function index($slug, Floor $floor, $floorSlug, Request $request)
    {
        $investment = Investment::findBySlug($slug);
        $uniqueRooms = $this->repository->getUniqueRooms($floor->properties);

        $investment_room = $investment->load(array(
            'floorRooms' => function ($query) use ($floor, $request) {
                $query->where('floor_id', $floor->id);

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
            'floor' => function ($query) use ($floor) {
                $query->where('id', $floor->id);
            }
        ));

        $page = Page::where('id', $this->pageId)->first();
        $next_floor = $floor->findNext($investment->id, $floor->position, null);
        $prev_floor = $floor->findPrev($investment->id, $floor->position, null);
        $investments = Investment::where('status', 1)
            ->when(in_array($investment->type, [1, 2]), function ($query) {
                $query->whereIn('type', [1, 2]);
            })
            ->when($investment->type == 3, function ($query) {
                $query->where('type', 3);
            })
            ->get(['id', 'type', 'name', 'slug']);

        return view('front.developro.investment_floor.index', [
            'investments' => $investments,
            'investment' => $investment_room,
            'floor' => $floor,
            'properties' => $investment_room->floorRooms,
            'uniqueRooms' => $uniqueRooms,
            'next_floor' => $next_floor,
            'prev_floor' => $prev_floor,
            'page' => $page,
            'static_page' => 'plan-inwestycji',
        ]);
    }
}
