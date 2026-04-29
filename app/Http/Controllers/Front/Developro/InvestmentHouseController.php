<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Property;
use App\Models\RodoRules;

class InvestmentHouseController extends Controller
{
    public function index(Property $property)
    {
        $investment = Investment::find(1);
        return view('front.developro.investment_house.index', [
            'investment' => $investment,
            'property' => $property,
            'next' => $property->findNext(1, $property->number_order),
            'prev' => $property->findPrev(1, $property->number_order),
            'rules' => RodoRules::orderBy('sort')->whereActive(1)->get()
        ]);
    }
}
