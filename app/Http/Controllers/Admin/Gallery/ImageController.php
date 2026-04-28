<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CMS
use App\Models\Image;
use App\Http\Requests\ImageFormRequest;
use App\Repositories\ImageRepository;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    private $repository;
    private $service;

    public function __construct(ImageRepository $repository, ImageService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $image = Image::create($request->merge([
            'gallery_id' => $request->get('gallery')
        ])->only([
            'gallery_id'
        ]));

        if ($request->hasFile('qqfile')) {
            $this->service->upload($request->file('qqfile'), $image);
        }
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.image.form', [
            'entry' => $image,
            'cardTitle' => 'Edytuj zdjęcie',
            'backButton' => route('admin.gallery.show', $image->gallery_id)
        ]);
    }

    public function update(ImageFormRequest $request, int $id)
    {

        $image = $this->repository->find($id);
        $this->repository->update($request->only('file_alt'), $image);

        if ($request->hasFile('file')) {
            $this->service->upload($request->file('file'), $image, true);
        }

        return redirect(route('admin.gallery.show', $image->gallery_id))->with('success', 'Obrazek zapisany');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted');
    }

    public function sort(Request $request)
    {
        $this->repository->updateOrder($request->get('recordsArray'));
    }

    public function move()
    {
        // Get all old news records
        $oldEntries = DB::connection('old_triada')->table('galeria_zdjecia')->get();

        foreach ($oldEntries as $b) {
            Image::forceCreate([
                'id' => $b->id,
                'gallery_id' => $b->id_gal,
                'name' => $b->nazwa,
                'file' => $b->plik,
                'sort' => $b->sort,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return 'Migration completed!';
    }
}
