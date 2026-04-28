@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-o-nas-inwestycje-zrealizowane'])

@section('meta_title', $page->title ?? 'Inwestycja zrealizowana - ' .$investment->name)
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <!-- MAIN SECTION -->
    <main class="overflow-hidden">
        <!-- BREADCRUMB -->
        <div class="container breadcrumb-section">
            <div class="row">
                <div class="col-12">
                    <a href="/">Strona główna</a> / <a href="/o-nas/">O nas</a> / <a href="/inwestycje-zrealizowane/">Inwestycje Zrealizowane</a> / {{ $investment->name }}
                </div>
            </div>
        </div>
        <!-- PAGE ENTRY -->
        <div class="container-fluid page-entry-single px-0 position-relative">
            <div class="page-entry-single__decor">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="483.288" viewBox="0 0 29 483.288">
                    <path id="single-slider-decor" d="M1919.5,1171.283h-29V770.4a213.737,213.737,0,0,0,9.558-19.68c3.258-7.556,6.474-15.887,9.3-24.092,5.148-14.956,8.75-28.674,10.144-38.628Z" transform="translate(-1890.5 -687.995)" fill="#5a5a5a"/>
                </svg>
            </div>
            <div class="container mb-5">
                <svg width="0" height="0" style="position:absolute;">
                    <defs>
                        <clipPath id="o-nas-clip" clipPathUnits="objectBoundingBox">
                            <path d="M1,1H0V0.922C0.001,0.914,0.004,0.899,0.008,0.883A0.256,0.256,0,0,1,0.015,0.84V0.029H0.664c0.033-0.018,0.065-0.029,0.098-0.029,0.011,0,0.022,0.001,0.033,0.001H1V1Z"/>
                        </clipPath>
                    </defs>
                </svg>
                <div class="row">
                    <div class="col-12 col-xl-6 d-flex flex-column align-items-start justify-content-center order-2 order-xl-1 mt-20 mt-xl-0 pe-3 pe-xl-5">
                        <h1 class="text-uppercase">{{ $investment->name }}</h1>
                        <p>&nbsp;</p>
                        {!! parse_text($investment->content) !!}
                    </div>
                    <div class="col-12 col-xl-6 order-1 order-xl-2">
                        <img src="{{ asset('/investment/thumbs/'. $investment->file_thumb ) }}" alt="{{ $investment->name }}" class="page-entry-single__img w-100">
                    </div>
                </div>
            </div>
        </div>
        <!-- SLIDER -->
        <div class="container-fluid single-slider px-0 position-relative scroll-anim-bottom d-none">
            <div class="single-slider__slider">
                <div class="single-slider__item position-relative">
                    <a href="/img/single-slider-01.png" class="single-slider__streched-link z-2" data-lightbox="single-gallery"></a>
                    <div class="d-flex position-relative overflow-hidden">

                        <img class="single-slider__slider-img" src="/img/single-slider-01.png" alt="Zdjęcie inwestycji">
                    </div>
                </div>
                <div class="single-slider__item position-relative">
                    <a href="/img/single-slider-02.png" class="single-slider__streched-link z-2" data-lightbox="single-gallery"></a>
                    <div class="d-flex position-relative overflow-hidden">

                        <img class="single-slider__slider-img" src="/img/single-slider-02.png" alt="Zdjęcie inwestycji">
                    </div>
                </div>
                <div class="single-slider__item position-relative">
                    <a href="/img/single-slider-03.png" class="single-slider__streched-link z-2" data-lightbox="single-gallery"></a>
                    <div class="d-flex position-relative overflow-hidden">

                        <img class="single-slider__slider-img" src="/img/single-slider-03.png" alt="Zdjęcie inwestycji">
                    </div>
                </div>
                <div class="single-slider__item position-relative">
                    <a href="/img/single-slider-01.png" class="single-slider__streched-link z-2" data-lightbox="single-gallery"></a>
                    <div class="d-flex position-relative overflow-hidden">

                        <img class="single-slider__slider-img" src="/img/single-slider-01.png" alt="Zdjęcie inwestycji">
                    </div>
                </div>
                <div class="single-slider__item position-relative">
                    <a href="/img/single-slider-02.png" class="single-slider__streched-link z-2" data-lightbox="single-gallery"></a>
                    <div class="d-flex position-relative overflow-hidden">

                        <img class="single-slider__slider-img" src="/img/single-slider-02.png" alt="Zdjęcie inwestycji">
                    </div>
                </div>
                <div class="single-slider__item position-relative">
                    <a href="/img/single-slider-03.png" class="single-slider__streched-link z-2" data-lightbox="single-gallery"></a>
                    <div class="d-flex position-relative overflow-hidden">

                        <img class="single-slider__slider-img" src="/img/single-slider-03.png" alt="Zdjęcie inwestycji">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END -> MAIN SECTION -->
@endsection
