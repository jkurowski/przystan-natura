@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-apartamenty'])

@section('meta_title', 'Inwestycje - '.$investment->name)
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
                @if($investment->status == 1)
                <div class="col-12 col-lg-3 col-xxl-2">
                    <div class="sidemenu d-none d-lg-block">
                        @include('front.developro.investment_shared.menu')
                    </div>
                </div>
                @endif
                <div class="@if($investment->status == 1) col-12 col-lg-9 col-xxl-10 @else col-12 @endif">
                    <div class="row ps-0 ps-lg-3 ps-xl-5">
                        <div class="col-12 col-xxl-6 pe-0 pe-xxl-5 mb-5 mb-xxl-0 d-flex align-items-center justify-content-center">
                            <div>
                                {!! $investment->content !!}
                                @if($investment->plan)
                                    <a href="{{ route('front.developro.plan', $investment->slug) }}" class="bttn bttn-white bttn-icon mt-5">Dostępne mieszkania <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#sendIcon)"><path d="M4.9776 4.25018L4.97086 6.26437L9.35486 6.26437L3.55046 12.0688L4.96731 13.4856L10.7717 7.68122L10.7717 12.0652L12.7859 12.0585L12.777 4.25905L4.9776 4.25018Z"></path></g><defs><clipPath id="sendIcon"><rect width="12.0465" height="12.0465" transform="translate(0 8.51855) rotate(-45)"></rect></clipPath></defs></svg></span></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6">
                            <div class="apartament-slider__slider-for mb-3">
                                @if($investment->images->count() < 5)
                                    @foreach($investment->images as $image)
                                        <div class="apartament-slider__item-for">
                                            <picture>
                                                @if($image->file_webp)
                                                    <source type="image/webp" srcset="{{asset('uploads/gallery/images/webp/'.$image->file_webp) }}">
                                                @endif
                                                <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/'.$image->file) }}">
                                                <img src="{{asset('uploads/gallery/images/'.$image->file) }}" alt="{{ $investment->name }}">
                                            </picture>
                                        </div>
                                    @endforeach
                                @endif
                                @foreach($investment->images as $image)
                                    <div class="apartament-slider__item-for">
                                        <picture>
                                            @if($image->file_webp)
                                                <source type="image/webp" srcset="{{asset('uploads/gallery/images/webp/'.$image->file_webp) }}">
                                            @endif
                                            <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/'.$image->file) }}">
                                            <img src="{{asset('uploads/gallery/images/'.$image->file) }}" alt="{{ $investment->name }}">
                                        </picture>
                                    </div>
                                @endforeach
                            </div>
                            <div class="apartament-slider__slider-nav">
                                @if($investment->images->count() < 5)
                                    @foreach($investment->images as $image)
                                        <div class="apartament-slider__item-nav">
                                            <picture>
                                                @if($image->file_webp)
                                                    <source type="image/webp" srcset="{{asset('uploads/gallery/images/thumbs/webp/'.$image->file_webp) }}">
                                                @endif
                                                <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/thumbs/'.$image->file) }}">
                                                <img src="{{asset('uploads/gallery/images/thumbs/'.$image->file) }}" alt="{{ $investment->name }}">
                                            </picture>
                                        </div>
                                    @endforeach
                                @endif
                                @foreach($investment->images as $image)
                                    <div class="apartament-slider__item-nav">
                                        <picture>
                                            @if($image->file_webp)
                                                <source type="image/webp" srcset="{{asset('uploads/gallery/images/thumbs/webp/'.$image->file_webp) }}">
                                            @endif
                                            <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/thumbs/'.$image->file) }}">
                                            <img src="{{asset('uploads/gallery/images/thumbs/'.$image->file) }}" alt="{{ $investment->name }}">
                                        </picture>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($investment->advantage_content)
        <div class="container-fluid apartament-text position-relative pt-6 pb-6 section-mobile">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6 col-xxl-5 d-flex flex-column align-items-start justify-content-center order-2 order-xl-1 mt-30 mt-xl-0 scroll-anim-top">
                        {!! $investment->advantage_content !!}
                    </div>
                    <div class="col-12 col-lg-12 col-xl-6 offset-0 offset-xl-0 offset-xxl-1 order-1 order-xl-2 mb-5 mb-xl-0">
                        <img src="{{ asset('/investment/advantage/'.$investment->file_advantage) }}" alt="Wizualizacja inwestycji {{ $investment->name }}" class="border-blue">
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div id="page">
        @if($investment->location_content)
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 ">
                        <div class="map-container">
                            <div id="locationmap" class="w-100 h-100"></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                        <div class="ps-0 ps-lg-5">
                            <div class="section-header">
                                <h2 class="big">Lokalizacja</h2>
                            </div>
                            {!! $investment->location_content !!}
                            @if($investment->status == 1)
                                <a href="{{ route('front.developro.page', [$investment->slug, 'lokalizacja']) }}" class="bttn bttn-white bttn-icon mt-3 mt-md-5">Zobacz więcej <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#sendIcon)"><path d="M4.9776 4.25018L4.97086 6.26437L9.35486 6.26437L3.55046 12.0688L4.96731 13.4856L10.7717 7.68122L10.7717 12.0652L12.7859 12.0585L12.777 4.25905L4.9776 4.25018Z"></path></g><defs><clipPath id="sendIcon"><rect width="12.0465" height="12.0465" transform="translate(0 8.51855) rotate(-45)"></rect></clipPath></defs></svg></span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
    <script src="{{ asset('/js/leaflet.js') }}" charset="utf-8"></script>
    <script>
        var map = L.map('locationmap').setView([{{$investment->lat}}, {{$investment->lng}}], {{$investment->zoom}});

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var myIcon = L.icon({
            iconUrl: "/img/map-icon.png",
            iconSize: [84, 84],
            iconAnchor: [43, 54],
        });

        L.marker([{{$investment->lat}}, {{$investment->lng}}], { icon: myIcon }).addTo(map)
            .bindPopup('<h4>{{ $investment->name }}</h4>{{ $investment->address }}',
                { offset: [0, -10] })
            .openPopup();
    </script>
@endpush
