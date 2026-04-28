<?php

namespace App\Http\Controllers\Admin\Developro\Page;

use App\Http\Controllers\Controller;

//CMS
use App\Models\Investment;
use App\Repositories\InvestmentPageRepository;
use App\Http\Requests\InvestPageFormRequest;
use App\Models\InvestmentPage;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    private InvestmentPageRepository $repository;

    public function __construct(InvestmentPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Investment $investment)
    {
        return view('admin.developro.investment_page.url-form', [
            'cardTitle' => 'Dodaj wpis',
            'investment' => $investment,
            'backButton' => route('admin.developro.investment.page.index', $investment)
        ])->with('entry', InvestmentPage::make());
    }

    public function store(InvestPageFormRequest $request, Investment $investment)
    {
        $this->repository->create($request->validated());
        return redirect(route('admin.developro.investment.page.index', $investment))->with('success', 'Nowy wpis dodany');
    }

    public function edit(Investment $investment, InvestmentPage $url)
    {

        return view('admin.developro.investment_page.url-form', [
            'entry' => $url,
            'investment' => $investment,
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.developro.investment.page.index', $investment)
        ]);
    }

    public function update(InvestPageFormRequest $request, Investment $investment, InvestmentPage $url)
    {
        $this->repository->update($request->validated(), $url);
        return redirect(route('admin.developro.investment.page.index', $investment))->with('success', 'Wpis zaktualizowany');
    }
}
