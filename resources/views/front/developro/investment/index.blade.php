@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-mieszkania'])

@section('meta_title', $page->title ?? 'Inwestycje w sprzedaży')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <div class="container-fluid mieszkania-submenu">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Inwestycje w sprzedaży</h1>
            </div>
        </div>
    </div>

    <div id="page">

    </div>
@endsection
