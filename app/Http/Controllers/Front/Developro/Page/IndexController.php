<?php

namespace App\Http\Controllers\Front\Developro\Page;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Page;
use App\Models\Property;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Repositories\InvestmentRepository;

class IndexController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 9;
    }

    public function show($slug, $page)
    {
        $investment = $this->repository->findBySlug($slug);
        $investmentPage = $investment->pages()->where('slug', $page)->first();
        $menu_page = Page::where('id', $this->pageId)->first();

        $investments = Investment::where('status', 1)
            ->when(in_array($investment->type, [1, 2]), function ($query) {
                $query->whereIn('type', [1, 2]);
            })
            ->when($investment->type == 3, function ($query) {
                $query->where('type', 3);
            })
            ->get(['id', 'type', 'name', 'slug']);

        return view('front.developro.investment_page.index', [
            'investment' => $investment,
            'investments' => $investments,
            'page' => $menu_page,
            'investment_page' => $investmentPage
        ]);
    }
}
