<?php

namespace App\Http\Controllers\Front\Developro\Rent;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('front.developro.rent.index');
    }

    public function show($slug)
    {
        if (!view()->exists('front.developro.rent.'.$slug)) {
            abort(404);
        }

        return view('front.developro.rent.'.$slug)
            ->with([
                'uri' => $slug
            ]);
    }
}
