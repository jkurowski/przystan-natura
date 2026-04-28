@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-wynajem'])

@section('meta_title', $page->title ?? 'Wynajem')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <main class="overflow-hidden">
        <!-- BREADCRUMB -->
        <div class="container breadcrumb-section">
            <div class="row">
                <div class="col-12">
                    <a href="/">Strona główna</a> / Wynajem
                </div>
            </div>
        </div>
        <!-- PAGE ENTRY -->
        <div class="container-fluid page-entry-center-wynajem px-0 position-relative">
            <div class="container ">
                <div class="row">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-0 offset-lg-1 offset-xl-2 offset-xxl-3  d-flex flex-column align-items-center justify-content-center order-2 order-xl-1 scroll-anim-top">
                        <h1 class="text-uppercase text-center">wynajem<br>lokali usługowych</h1>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid wynajem-list px-0 position-relative">
            <div class="wynajem-list__decor">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="483.288" viewBox="0 0 29 483.288">
                    <path id="single-slider-decor" d="M1919.5,1171.283h-29V770.4a213.737,213.737,0,0,0,9.558-19.68c3.258-7.556,6.474-15.887,9.3-24.092,5.148-14.956,8.75-28.674,10.144-38.628Z" transform="translate(-1890.5 -687.995)" fill="#5a5a5a"/>
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4 mb-15 mb-sm-30 scroll-anim-bottom">
                        <div class="wynajem-list__item position-relative">
                            <a href="/wynajem/wolowska-business-park" class="wynajem-list__streched-link z-2"></a>
                            <div class="d-flex position-relative">
                                <img class="wynajem-list__img" src="{{ asset('img/temp/wolowska-business-park-magazyny-i-biura-do-wynajecia.jpg') }}" width="550" height="361" alt="Zdjęcie inwestycji Wołowska Business Park">
                            </div>
                            <div class="d-flex flex-column align-items-start justify-content-start p-20">
                                <h3 class="text-uppercase mb-10">wołowska business park</h3>
                                <span class="mb-15">ul. Wołowska we Wrocławiu.</span>
                                <span class="mb-15">Termin realizacji to XII. 2025 r.</span>
                                <div class="d-flex flex-row align-items-center justify-content-start gap-2 mb-15">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="area-icon" width="20" height="20" viewBox="0 0 20 20"><path d="M14.192,0H4.731A4.731,4.731,0,0,0,0,4.731v9.462a4.731,4.731,0,0,0,4.731,4.731h9.462a4.731,4.731,0,0,0,4.731-4.731V4.731A4.731,4.731,0,0,0,14.192,0Zm3.844,14.192a3.848,3.848,0,0,1-3.844,3.844H4.731A3.848,3.848,0,0,1,.887,14.192V4.731A3.848,3.848,0,0,1,4.731.887h9.462a3.848,3.848,0,0,1,3.844,3.844Z"/><path d="M24.37,23.743l-7.356-7.356h2.91V15.5H15.5v4.424h.887v-2.91l7.356,7.356h-2.91v.887h4.424V20.833H24.37Z" transform="translate(-10.917 -10.917)"/></svg>
                                    <span>Powierzchnia łącznie: 1500 m<sup>2</sup></span>
                                </div>
                                <span class="mb-1">Zapraszamy do kontaktu</span>
                                <a href="tel:+48609000201" class="wynajem-list__tel mb-20 z-2">+48 609 000 201</a>
                                <a href="/wynajem/wolowska-business-park" class="custom-button z-2">Sprawdź</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-40 mt-lg-60 mt-xl-80 d-none">
                    <div class="col-12">
                        <div class="pagination d-flex align-items-center justify-content-center gap-20 gap-md-50">
                            <a href="#" class="pagination__btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.685" height="15.588" viewBox="0 0 8.685 15.588"><path id="arrow-left" d="M285.484-836.722l.891-.891-6.9-6.9,6.9-6.9-.891-.891-7.794,7.794Z" transform="translate(-277.69 852.31)" fill="#fff"></path></svg>
                            </a>
                            <span class="pagination__current">
                                1
                            </span>
                            <a href="#" class="pagination__link">2</a>
                            <a href="#" class="pagination__link">3</a>
                            <a href="#" class="pagination__btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.685" height="15.588" viewBox="0 0 8.685 15.588"><path id="arrow-next" d="M278.581-836.722l-.891-.891,6.9-6.9-6.9-6.9.891-.891,7.794,7.794Z" transform="translate(-277.69 852.31)" fill="#fff"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        @include('front.contact.offer-ask-form')
    </main>
@endsection

@push('scripts')

@endpush
