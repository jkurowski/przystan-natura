<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// CMS
use App\Models\Article;
use App\Models\Page;

class ArticleController extends Controller
{

    public function index($type)
    {
        $config = [
            'aktualnosci' => [
                'type' => 1,
                'view' => 'front.article.index',
                'page' => 5
            ],
            'blog' => [
                'type' => 2,
                'view' => 'front.blog.index',
                'page' => 6
            ]
        ];

        $data = $config[$type];

        $page = Page::find($data['page']);

        $articles = Article::where('status', 1)
            ->where('type', $data['type'])
            ->orderByDesc('posted_at')
            ->get();

        return view($data['view'], compact('page', 'articles'));
    }

    public function show($type, $slug)
    {

        $config = [
            'aktualnosci' => [
                'type' => 1,
                'page' => 5
            ],
            'blog' => [
                'type' => 2,
                'page' => 6
            ]
        ];

        $data = $config[$type];

        $article = Article::where('slug', $slug)->where('type', $data['type'])->first();

        $previousArticles = Article::where('posted_at', '<', $article->posted_at)
            ->where('status', 1)
            ->where('type', $data['type'])
            ->orderBy('posted_at', 'desc')
            ->take(2)
            ->get();

        //$page = Page::where('uri', 'aktualnosci')->firstOrFail();
        $page = Page::whereId(2)->first();

//        $schemaBlog = Schema::BlogPosting()
//            ->mainEntityOfPage(Schema::WebPage()->identifier(route('front.news.show', $article->slug)))
//            ->headline($article->title)
//            ->description($article->content_entry)
//            ->datePublished($article->created_at)
//            ->dateModified($article->updated_at)
//            ->image(Schema::imageObject()->url(asset('uploads/articles/'.$article->file))
//                ->height(config('images.article.big_height'))
//                ->width(config('images.article.big_width')))
//            ->author(Schema::person()->name('Autor'));
//
//        $og = OpenGraph::title($article->title)
//            ->type('article')
//            ->image('https://www.bliskiolechow.pl/public/uploads/articles/share/'.$article->file, [
//                'width' => 600,
//                'height' => 314
//            ])
//            ->description($article->content_entry)
//            ->url();

        return view('front.article.show', [
            'page' => $page,
            'article' => $article,
            'previousArticles' => $previousArticles,
            'type' => $type,
            //'opengraph' => $og
        ]);
    }

    public function move()
    {
        // Get all old news records
        $oldNews = DB::connection('old_triada')->table('news')->get();

        foreach ($oldNews as $news) {
            Article::forceCreate([
                'id' => $news->id,
                'title' => $news->tytul,
                'slug' => Str::slug($news->tytul),
                'content_entry' => $news->wprowadzenie,
                'content' => $news->tekst,
                'file' => $news->plik,
                'file_webp' => null,
                'file_facebook' => null,
                'file_alt' => null,
                'meta_title' => $news->meta_tytul,
                'meta_description' => $news->meta_opis,
                'meta_robots' => null,
                'status' => $news->status,
                'sort' => 0,
                'posted_at' => $news->data,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return 'Migration completed!';
    }
}
