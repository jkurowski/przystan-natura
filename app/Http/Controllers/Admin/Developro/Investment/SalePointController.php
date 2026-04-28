<?php

namespace App\Http\Controllers\Admin\Developro\Investment;

use App\Http\Controllers\Controller;

// CMS
use App\Http\Requests\InvestmentSalePointRequest as FormRequest;
use App\Models\InvestmentSalePoint as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalePointController extends Controller
{
    protected string $listViewPath = 'admin.developro.investment_sale_point.index';
    protected string $formViewPath = 'admin.developro.investment_sale_point.form';
    protected string $routeIndex = 'admin.developro.investment-sale-point.index';


    public function index()
    {
        $list = Model::orderBy('position', 'ASC')->get();
        return view($this->listViewPath, compact('list'));
    }

    public function create()
    {
        return view($this->formViewPath, [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route($this->routeIndex)
        ])->with('entry', Model::make());
    }

    public function store(FormRequest $request)
    {
        Model::create($request->validated());

        return redirect()
            ->route($this->routeIndex)
            ->with('success', 'Nowy punkt sprzedaży dodany.');
    }

    public function edit($id)
    {
        return view($this->formViewPath, [
            'entry' => Model::find($id),
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route($this->routeIndex)
        ]);
    }

    public function update(FormRequest $request, $id)
    {
        $component = Model::findOrFail($id);
        $component->update($request->validated());

        return redirect()
            ->route($this->routeIndex)
            ->with('success', 'Punkt sprzedaży został zaktualizowany.');
    }

    public function destroy(int $id)
    {
        $component = Model::findOrFail($id);
        $component->delete();

        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $recordsArray = $request->input('recordsArray', []);

        // Walidacja wejścia
        if (!is_array($recordsArray) || empty($recordsArray)) {
            return response()->json(['error' => 'Brak poprawnych danych do sortowania.'], 400);
        }

        DB::transaction(function () use ($recordsArray) {
            foreach ($recordsArray as $index => $recordId) {
                if ($recordId > 0) {
                    $entry = Model::find($recordId);
                    if ($entry) {
                        $entry->update(['position' => $index + 1]);
                    }
                }
            }
        });

        return response()->json(['success' => true]);
    }

}
