<?php

namespace App\Http\Controllers\Admin\Developro\Plots;

use App\Http\Controllers\Controller;

// CMS
use App\Http\Requests\PlotFormRequest;
use App\Models\PropertyPriceComponent;
use App\Repositories\InvestmentRepository;
use App\Repositories\PropertyRepository;
use App\Services\PropertyService;

use App\Models\Investment;
use App\Models\Property;

class IndexController extends Controller
{
    private PropertyRepository $repository;
    private PropertyService $service;
    private InvestmentRepository $investmentRepository;
    public function __construct(PropertyRepository $repository, PropertyService $service, InvestmentRepository $investmentRepository)
    {
//        $this->middleware('permission:plots-list|plots-create|plotsedit|plots-delete', [
//            'only' => ['index','store']
//        ]);
//        $this->middleware('permission:plots-create', [
//            'only' => ['create','store']
//        ]);
//        $this->middleware('permission:plots-edit', [
//            'only' => ['edit','update']
//        ]);
//        $this->middleware('permission:plots-delete', [
//            'only' => ['destroy']
//        ]);

        $this->repository = $repository;
        $this->service = $service;
        $this->investmentRepository = $investmentRepository;
    }

    public function index(Investment $investment)
    {
        return view('admin.developro.investment_plot.index', ['investment' => $investment]);
    }

    public function create(Investment $investment)
    {
        $priceComponents = PropertyPriceComponent::all();

        return view('admin.developro.investment_plot.form', [
            'cardTitle' => 'Dodaj dom',
            'backButton' => route('admin.developro.investment.plots.index', $investment),
            'investment' => $investment,
            'priceComponents' => $priceComponents,
        ])->with('entry', Property::make());
    }

    public function store(PlotFormRequest $request, Investment $investment)
    {
        $property = $this->repository->create(array_merge($request->validated(), [
            'investment_id' => $investment->id
        ]));

        $types = $request->input('price-component-type', []);
        $categories = $request->input('price-component-category', []);
        $values = $request->input('price-component-value', []);
        $values_m2 = $request->input('price-component-m2-value', []);

        $data = [];

        foreach ($types as $index => $componentId) {
            $data[$componentId] = [
                'category' => $categories[$index],
                'value' => $values[$index],
                'value_m2' => $values_m2[$index],
            ];
        }

        $property->priceComponents()->sync($data);

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $property);
        }

        if ($request->hasFile('file_pdf')) {
            $this->service->uploadPdf($request->name, $request->file('file_pdf'), $property);
        }

        return redirect(route('admin.developro.investment.plots.index', ['investment' => $investment]))->with('success', 'Dom poprawnie zapisany');
    }

    public function edit(Investment $investment, Property $plot)
    {
        $priceComponents = PropertyPriceComponent::all();

        return view('admin.developro.investment_plot.form', [
            'cardTitle' => 'Edytuj dom',
            'backButton' => route('admin.developro.investment.plots.index', $investment),
            'investment' => $investment,
            'entry' => $plot,
            'priceComponents' => $priceComponents
        ]);
    }

    public function update(PlotFormRequest $request, Investment $investment, Property $plot)
    {
        $this->repository->update($request->validated(), $plot);

        $types = $request->input('price-component-type', []);
        $categories = $request->input('price-component-category', []);
        $values = $request->input('price-component-value', []);
        $values_m2 = $request->input('price-component-m2-value', []);

        $data = [];

        foreach ($types as $index => $componentId) {
            $data[$componentId] = [
                'category' => $categories[$index],
                'value' => $values[$index],
                'value_m2' => $values_m2[$index],
            ];
        }

        $plot->priceComponents()->sync($data);

        if ($request->hasFile('file')) {
            $this->service->upload($request->name, $request->file('file'), $plot, true);
        }

        if ($request->hasFile('file_pdf')) {
            $this->service->uploadPdf($request->name, $request->file('file_pdf'), $plot, true);
        }

        $this->investmentRepository->sendMessageToInvestmentSupervisors($investment, 'Zmiana parametrów: '.$plot->name);

        return redirect(route('admin.developro.investment.plots.index', ['investment' => $investment->id]))->with('success', 'Dom zaktualizowany');
    }

    public function destroy(Investment $investment, int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }
}
