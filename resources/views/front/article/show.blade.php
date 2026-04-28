@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-blog'])

@section('meta_title', $page->title ?? 'Aktualności' . ' - '.$article->title)
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <div id="page">
        <div class="container">
            <div class="row single-article">
                <div class="col-12 col-xxl-10 offset-0 offset-xxl-1">
                    <picture>
                        @if($article->file_webp)
                            <source type="image/webp" srcset="{{asset('uploads/articles/webp/'.$article->file_webp) }}">
                        @endif
                        <source type="image/jpeg" srcset="{{asset('uploads/articles/'.$article->file) }}">
                        <img src="{{asset('uploads/articles/'.$article->file) }}" alt="@if($article->file_alt){{$article->file_alt}}@else{{$article->title}}@endif" class="w-100">
                    </picture>
                    <div class="d-flex flex-row align-items-center justify-content-start gap-2 mt-5 article-date">
                        <svg width="19px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 9H21M17 13.0014L7 13M10.3333 17.0005L7 17M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#939393" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        {{ $article->posted_at }}
                    </div>
                    <h1>{{ $article->title }}</h1>
                    <p>{{ $article->content_entry }}</p>
                    <p>{!! parse_text($article->content, true) !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-6 pb-6 section-mobile">
        <section class="row blog blog-blue" aria-label="Aktualności">
            @foreach($previousArticles as $article)
                <div class="col-12 col-md-6">
                    <article class="position-relative mb-0">
                        <a href="{{ route('front.aktualnosci.show',[$type, $article->slug]) }}">

                            <div class="d-flex flex-row align-items-center justify-content-start gap-1 article-date">
                                <svg width="19px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 9H21M17 13.0014L7 13M10.3333 17.0005L7 17M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#939393" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <time datetime="{{ $article->posted_at }}">
                                    {{ $article->posted_at }}
                                </time>
                            </div>

                            <h3>{{ $article->title }}</h3>

                            <picture>
                                @if($article->file_webp)
                                    <source type="image/webp" srcset="{{ asset('uploads/articles/thumbs/webp/'.$article->file_webp) }}">
                                @endif

                                <source type="image/jpeg" srcset="{{ asset('uploads/articles/thumbs/'.$article->file) }}">

                                <img
                                    src="{{ asset('uploads/articles/thumbs/'.$article->file) }}"
                                    alt="{{ $article->file_alt ?? $article->title }}"
                                    loading="lazy"
                                    decoding="async"
                                    fetchpriority="low">
                            </picture>

                            <span class="arrow" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none"><g clip-path="url(#arrowIconBig)"><path d="M9.91157 8.4627L9.89814 12.4732L18.6273 12.4732L7.06992 24.0306L9.89107 26.8518L21.4485 15.2944L21.4485 24.0235L25.459 24.0101L25.4413 8.48037L9.91157 8.4627Z" fill=""></path></g><defs><clipPath id="arrowIconBig"><rect width="23.9862" height="23.9862" fill="white" transform="translate(0 16.9609) rotate(-45)"></rect></clipPath></defs></svg></span>
                        </a>
                    </article>
                </div>
            @endforeach
        </section>
    </div>
@endsection
