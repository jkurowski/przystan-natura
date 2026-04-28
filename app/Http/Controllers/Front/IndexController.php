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
        if ($request->has('investment')) {
            $query = $request->only(['area', 'rooms', 'highlighted', 'price', 'type', 'kitchen', 'balcony', 'garden', 'terrace']);

            if ($request->filled('investment')) {
                return redirect()->route('front.developro.plan', [
                        'slug' => $request->investment
                    ] + $query);
            }

            return redirect()->route('front.developro.search.index', $query);
        }

        $news = Article::where('status', 1)->where('type', 1)->orderBy('posted_at', 'DESC')->limit(5)->get();

        return view('front.homepage.index', [
            'news' => $news,
        ]);
    }
}
