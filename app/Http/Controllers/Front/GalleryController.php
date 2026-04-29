<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

// CMS
use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Support\Str;

class GalleryController extends Controller
{

    public function index()
    {
        $page = Page::where('id', 1)->first();

        $galleries = Gallery::where('status', 1)
            ->orderBy('sort', 'asc')
            ->get();

        $firstGallery = $galleries->first()?->load('photos');

        return view('front.gallery.index', [
            'page' => $page,
            'categories' => $galleries,
            'gallery' => $firstGallery,
            'current_id' => $firstGallery?->id
        ]);
    }

    public function show($id, $slug)
    {
        $page = Page::where('id', 1)->first();

        $galleries = Gallery::where('status', 1)
            ->orderBy('sort', 'asc')
            ->get();

        $gallery = Gallery::where('id', $id)->with('photos')->first();

        return view('front.gallery.show', [
            'page' => $page,
            'categories' => $galleries,
            'gallery' => $gallery,
            'current_id' => $id
        ]);
    }
}
