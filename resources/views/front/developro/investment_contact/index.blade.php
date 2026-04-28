@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-apartamenty'])

@section('meta_title', 'Inwestycje - '.$investment->name)
@section('meta_title', $page->title ?? 'Inwestycje w sprzedaży')
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
                    <a href="/">Strona główna</a> / {{ $investment->name }} / Kontakt
                </div>
            </div>
        </div>

        <!-- MENU TABS -->
        @include('front.developro.investment_shared.menu')

        <!-- ENTRY -->
        <div class="container-fluid inwestycje-kontakt position-relative px-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xxl-10 offset-0 offset-xxl-1 d-flex align-items-center justify-content-center flex-column">
                        <h1 class="text-uppercase">Kontakt</h1>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 col-xxl-4 d-flex flex-column align-items-center align-items-lg-start justify-content-center mt-30 mt-lg-0 order-2 order-lg-1">
                        {!! parse_text($investment->contact_content) !!}
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-7 offset-0 offset-xxl-1 d-flex align-items-center align-items-xl-end justify-content-center order-1 order-lg-2 mt-30 mt-lg-0">
                        <div class="inwestycje-kontakt__img-wrapper">
                            <img class="inwestycje-kontakt__img" src="{{ asset("img/inwest-kontakt-img.png") }}" width="526" height="605" alt="Zdjęcie w tle">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        @include('front.contact.offer-ask-form', [
            'pageTitle' => $investment->name,
            'investmentName' => $investment->name,
            'investmentId' => $investment->id,
            'back' => true
        ])
    </main>
    <!-- END -> MAIN SECTION -->
@endsection
@push('scripts')

@endpush
