<?php

namespace App\Http\Controllers\Admin\Charity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CMS
use App\Repositories\CharityRepository;
use App\Services\CharityService;

// Form Requests
use App\Http\Requests\CharityFormRequest;

// Models
use App\Models\CharityActivity;

class IndexController extends Controller
{
    private CharityRepository $repository;
    private CharityService $service;

    public function __construct(CharityRepository $repository, CharityService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.charity.index', ['list' => $this->repository->allSort('ASC')]);
    }

    public function create()
    {
        return view('admin.charity.form', [
            'cardTitle' => 'Dodaj wpis',
            'backButton' => route('admin.charity.index')
        ])->with('entry', CharityActivity::make());
    }

    public function store(CharityFormRequest $request)
    {
        $validatedData = $request->validated();
        $entry = $this->repository->create($validatedData);
        $this->updateFiles($request, $entry, 'image', 'upload', false);
        return redirect(route('admin.charity.index'))->with('success', 'Nowy wpis dodany');
    }

    public function edit(int $id)
    {
        return view('admin.charity.form', [
            'entry' => CharityActivity::find($id),
            'cardTitle' => 'Edytuj wpis',
            'backButton' => route('admin.charity.index')
        ]);
    }

    public function update(CharityFormRequest $request, CharityActivity $charity)
    {
        $this->repository->update($request->validated(), $charity);
        $this->updateFiles($request, $charity, 'image', 'upload', true);
        return redirect(route('admin.charity.index'))->with('success', 'Wpis zaktualizowany');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }

    private function updateFiles(CharityFormRequest $request, object $model, string $fileField, string $uploadMethod, bool $delete)
    {
        if ($request->hasFile($fileField)) {
            $this->service->$uploadMethod($request->file($fileField), $model, $delete);
        }
    }
}
