<?php

namespace App\Http\Controllers\Front\Developro\Contact;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Page;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 4;
    }

    public function index($slug)
    {
        $investment = Investment::with('pages')
            ->where('slug', $slug)
            ->firstOrFail();
        $page = Page::find($this->pageId);

        $investments = Investment::where('status', 1)
            ->when(in_array($investment->type, [1, 2]), function ($query) {
                $query->whereIn('type', [1, 2]);
            })
            ->when($investment->type == 3, function ($query) {
                $query->where('type', 3);
            })
            ->get(['id', 'type', 'name', 'slug']);

        return view('front.developro.investment_contact.index', [
            'investment' => $investment,
            'investments' => $investments,
            'page' => $page,
            'static_page' => 'kontakt-inwestycji'
        ]);
    }
}
