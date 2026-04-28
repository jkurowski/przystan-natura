<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Investment;
use App\Models\Page;
use App\Models\Property;

class InvestmentPropertyController extends Controller
{
    private $pageId;

    public function __construct()
    {
        $this->pageId = 9;
    }


    #'/i/{slug}/{floor},{floorSlug}/{property},{propertySlug},{propertyFloor},{propertyRooms},{propertyArea}'
    public function index($slug, Floor $floor, $floorSlug, Property $property, $propertySlug)
    {
        $property->timestamps = false;
        $property->increment('views');
        $page = Page::where('id', $this->pageId)->first();
        $investment = Investment::findBySlug($slug);

        $areaSearch = $property->area_search;

        $similarProperties = Property::whereBetween('area_search', [$areaSearch - 5, $areaSearch + 5])
            ->where('id', '!=', $property->id)
            ->where('investment_id', '=', $investment->id)
            ->where('status', '=', 1)
            ->where('type', '=', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $property->with('relatedProperties');

        $next = $property->findNext($investment->id, $property->number_order, $property->floor_id);

        $prev = $property->findPrev($investment->id, $property->number_order, $property->floor_id);

        return view('front.developro.investment_property.index', [
            'investment' => $investment,
            'floor' => $floor,
            'property' => $property,
            'page' => $page,
            'next' => $next,
            'prev' => $prev,
            'similarProperties' => $similarProperties
        ]);
    }
}
