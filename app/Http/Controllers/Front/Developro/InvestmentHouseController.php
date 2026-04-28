<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Property;
use App\Models\RodoRules;

class InvestmentHouseController extends Controller
{
    public function index($slug, Property $property)
    {
        $investment = Investment::findBySlug($slug);

        // Check if the property exists in the investment's properties
        if (!$investment->properties->contains($property)) {
            abort(404, 'Property not found in the specified investment.');
        }

        $areaSearch = $property->area_search;

        $similarProperties = Property::where('id', '!=', $property->id)
            ->where('investment_id', '=', $investment->id)
            ->where('status', '=', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('front.developro.investment_house.index', [
            'investment' => $investment,
            'property' => $property,
            'next' => $property->findNext($investment->id, $property->number_order),
            'prev' => $property->findPrev($investment->id, $property->number_order),
            'rules' => RodoRules::orderBy('sort')->whereActive(1)->get(),
            'similarProperties' => $similarProperties
        ]);
    }
}
