@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-apartamenty'])

@section('meta_title', 'Inwestycje - '.$investment->name.' - '.$investment_page->title)
@section('meta_title', $page->title ?? 'Inwestycje w sprzedaży')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <div class="container-fluid mieszkania-submenu">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ $investment->name }}</h1>
            </div>
        </div>
    </div>

    <div id="page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 col-xxl-2">
                    <div class="sidemenu sticky-top d-none d-lg-block">
                        @include('front.developro.investment_shared.menu')
                    </div>
                </div>
                <div class="col-12 col-lg-9 col-xxl-10">
                    <div class="ps-0 ps-lg-3 ps-xl-5 mieszkania-page">
                        <h2 class="mieszkania-page-title">{{ $investment_page->title }}</h2>
                        {!! parse_text($investment_page->content) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM -->
    <div class="pt-5 pt-xxl-6 pb-5 pb-xxl-0">
        @include('front.contact.form', [
            'page_name' => $investment->name,
            'investmentName' => $investment->name,
            'investmentId' => $investment->id,
            'emailAddress' => $investment->office_emails,
            'back' => true
        ])
    </div>
@endsection
