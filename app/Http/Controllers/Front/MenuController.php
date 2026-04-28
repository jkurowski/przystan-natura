<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CharityActivity;
use App\Models\Inline;
use App\Models\Page;
use App\Repositories\JobRepository;

class MenuController extends Controller
{
    private JobRepository $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($uri = null)
    {

        $pages = [
            'kontakt' => 1,
            'lokalizacja' => 1,
            'o-inwestorze' => 1,
            'galeria' => 1,
        ];

        if (isset($pages[$uri])) {
            $page = Page::find($pages[$uri]);
        }

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                'page' => $page,
                //'parent' => $parent
                'uri' => $uri,
                //'data' => $data,
                //'array' => $inline,
            ]);
    }

    public function kredyt()
    {
        $uri = 'kredyt';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function poradnik()
    {
        $uri = 'poradnik-mieszkanca';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function odbior()
    {
        $uri = 'odbior';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function akt()
    {
        $uri = 'akt';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function media()
    {
        $uri = 'media';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function finansowanie()
    {
        $uri = 'finansowanie';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function wykonczenie()
    {
        $uri = 'wykonczenie';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }
    public function strefa()
    {
        $uri = 'strefa';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }
    public function onas()
    {
        $uri = 'o-nas';
        //$page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();
        $charity = CharityActivity::orderBy('sort')->get();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                //'page' => $page,
                'uri' => $uri,
                'array' => $inline,
                'charity' => $charity,
            ]);
    }

    public function dzialki()
    {
        $uri = 'dzialki';
        //$page = Page::where('uri', $uri)->firstOrFail();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                'uri' => $uri
            ]);
    }
}
