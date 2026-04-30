<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

// CMS
use App\Models\Article;
use App\Models\Investment;
use App\Models\InvestmentSelectfield;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $investment = Investment::find(1);

        if ($investment->type == 3) {
            $investment_room = $investment->load(array(
                'properties' => function ($query) use ($request) {}
            ));

            $properties = $investment_room->properties;
        }

        return view('front.homepage.index', [
            'investment' => $investment,
            'properties' => $properties ?? null,
        ]);
    }
}
