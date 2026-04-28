<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//CMS
use App\Repositories\InvestmentRepository;
use App\Models\Investment;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Page;

class InvestmentPlanController extends Controller
{
    private $repository;
    private $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 5;
    }

    public function index(Request $request)
    {
        $investment = Investment::find(1);
        $uniqueRooms = $this->repository->getUniqueRooms($investment->properties);

        if($investment->type == 1){
            $investment_room = $investment->load(array(
                'buildingRooms' => function ($query) use ($request) {
                    $query->orderBy('properties.highlighted', 'DESC');
                    $query->orderBy('properties.status', 'ASC');
                    $query->orderBy('properties.number_order', 'ASC');

                    if ($request->input('price')) {
                        $area_param = explode('-', $request->input('price'));
                        $min = $area_param[0];
                        $max = $area_param[1];
                        $query->whereBetween('price_brutto', [$min, $max]);
                    }

                    if ($request->input('rooms')) {
                        $query->where('rooms', $request->input('rooms'));
                    }

                    if ($request->input('status')) {
                        $query->where('status', $request->input('status'));
                    }

                    if ($request->input('floor')) {
                        $query->where('floor_id', $request->input('floor'));
                    }

                    if ($request->input('area')) {
                        $area_param = explode('-', $request->input('area'));
                        $min = $area_param[0];
                        $max = $area_param[1];
                        $query->whereBetween('area_search', [$min, $max]);
                    }

                    if ($request->input('highlighted')) {
                        $query->where('highlighted', $request->input('highlighted'));
                    }

                    if ($request->input('sort')) {
                        $order_param = explode(':', $request->input('sort'));
                        $column = $order_param[0];
                        $direction = $order_param[1];
                        $query->orderBy($column, $direction);
                    }
                    $query->where('type', 1);
                },
                'plan'
            ));

            $properties = $investment_room->buildingRooms;
        }

        /**
         * Inwestycja z jednym budynkiem
         */
        if ($investment->type == 2) {
            $investment_room = $investment->load(array(
                'floorRooms' => function ($query) use ($request, $investment) {
                    $query->orderBy('properties.highlighted', 'DESC');
                    $query->orderBy('properties.number_order', 'ASC');

                    if ($request->input('rooms')) {
                        $query->where('rooms', $request->input('rooms'));
                    }

                    if ($request->input('status')) {
                        $query->where('status', $request->input('status'));
                    }

                    if ($request->input('floor')) {
                        $query->where('floor_id', $request->input('floor'));
                    }

                    if ($investment->show_properties == 3) {
                        $query->where('status', 1);
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

                    if ($request->input('highlighted')) {
                        $query->where('highlighted', $request->input('highlighted'));
                    }

                    if ($request->input('sort')) {
                        $order_param = explode(':', $request->input('sort'));
                        $column = $order_param[0];
                        $direction = $order_param[1];
                        $query->orderBy($column, $direction);
                    }

                    $query->where('properties.type', 1);
                }
            ));

            $properties = $investment_room->floorRooms;
        }

        /**
         * Inwestycja z domami
         */
        if ($investment->type == 3) {
            $investment_room = $investment->load(array(
                'properties' => function ($query) use ($request) {
                    if ($request->input('rooms')) {
                        $query->where('rooms', $request->input('rooms'));
                    }

                    if ($request->input('area')) {
                        $area_param = explode('-', $request->input('area'));
                        $min = $area_param[0];
                        $max = $area_param[1];
                        $query->whereBetween('area_search', [$min, $max]);
                    }

                    if ($request->input('price')) {
                        $area_param = explode('-', $request->input('price'));
                        $min = $area_param[0];
                        $max = $area_param[1];
                        $query->whereBetween('price_brutto', [$min, $max]);
                    }

                    if ($request->input('status')) {
                        $query->where('status', $request->input('status'));
                    }

                    if ($request->input('highlighted')) {
                        $query->where('highlighted', $request->input('highlighted'));
                    }

                    if ($request->input('sort')) {
                        $order_param = explode(':', $request->input('sort'));
                        $column = $order_param[0];
                        $direction = $order_param[1];
                        $query->orderBy($column, $direction);
                    }
                }
            ));

            $properties = $investment_room->properties;
        }

        $page = Page::where('id', $this->pageId)->first();
        $investments = Investment::where('status', 1)
            ->when(in_array($investment->type, [1, 2]), function ($query) {
                $query->whereIn('type', [1, 2]);
            })
            ->when($investment->type == 3, function ($query) {
                $query->where('type', 3);
            })
            ->get(['id', 'type', 'name', 'slug']);

        return view('front.developro.investment_plan.index', [
            'investment' => $investment,
            'investments' => $investments,
            'properties' => $properties,
            'uniqueRooms' => $uniqueRooms,
            'page' => $page,
            'static_page' => 'plan-inwestycji'
        ]);
    }

    public function mockup($lang, $slug)
    {
        $investment = Investment::findBySlug($slug);

        $page = Page::where('id', $this->pageId)->first();

        return view('front.developro.investment_plan.mockup', [
            'investment' => $investment,
            'page' => $page
        ]);
    }
}


