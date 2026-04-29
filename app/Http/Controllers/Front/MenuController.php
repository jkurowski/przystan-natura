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
            'lokalizacja' => 4,
            'o-inwestorze' => 2,
            'galeria' => 3,
            'polityka-prywatnosci' => 6,
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
}
