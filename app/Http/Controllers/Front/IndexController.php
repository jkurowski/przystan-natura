<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

// CMS
use App\Models\Article;
use App\Models\Investment;
use App\Models\InvestmentSelectfield;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $popup = 0;
        if(settings()->get("popup_status") == "1") {
            if(settings()->get("popup_mode") == "1") {
                Cookie::queue('popup', null);
                $popup = 1;
            } else {
                if(Cookie::get('popup') == null){
                    $popup = 1;
                    Cookie::queue('popup', true);
                }
            }
        } else {
            Cookie::queue('popup', null);
        }

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
            'popup' => $popup
        ]);
    }
}
