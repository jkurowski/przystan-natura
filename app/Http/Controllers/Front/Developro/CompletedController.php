<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Investment;
use App\Models\Page;
use Illuminate\Http\Request;

class CompletedController extends Controller
{
    private int $pageId;
    public function __construct()
    {
        $this->pageId = 10;
    }

    public function index()
    {
        $page = Page::find($this->pageId);
        $investments = Investment::orderBy('sort', 'asc')->whereStatus(2)->get();

        return view('front.developro.completed.index', [
            'page' => $page,
            'investments' => $investments
        ]);
    }

    public function show($slug)
    {
        $page = Page::find($this->pageId);
        $investment = Investment::whereSlug($slug)->first();

        return view('front.developro.completed.show', [
            'page' => $page,
            'investment' => $investment,
            'others' => $investment->others(2, 5)
        ]);
    }
}
