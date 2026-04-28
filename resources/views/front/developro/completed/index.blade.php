@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-o-nas-inwestycje-zrealizowane'])

@section('meta_title', $page->title ?? 'Inwestycje zrealizowane')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <!-- MAIN SECTION -->
    <div id="page">
        <div class="container">
            <div class="row">
                @foreach($investments as $i)
                    <div class="col-12 col-md-6 col-xl-4 mb-4">
                        <div class="zrealizowane">
                            @if(1 == 2)
                                <a href="{{ route('front.developro.completed.show', $i->slug) }}" class="zrealizowane__streched-link z-2"></a>
                            @endif
                            <div class="d-flex position-relative zrealizowane-img">
                                <img src="{{ asset('/investment/thumbs/'. $i->file_thumb ) }}" width="456" height="380" alt="Wizualizacja inwestycji {{ $i->name }}">
                            </div>
                            <div class="d-flex flex-column align-items-start justify-content-start p-20">
                                <h3 class="text-uppercase mb-10">{{ $i->name }}</h3>
                                <ul class="mb-0 list-unstyled">
                                    <li>
                                        <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#939393" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 22C16 18 20 14.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 14.4183 8 18 12 22Z" stroke="#939393" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ $i->inv_city }}, {{ $i->inv_street }} {{ $i->inv_property_number }}
                                    </li>
                                    <li>
                                        <svg width="19px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 9H21M17 13.0014L7 13M10.3333 17.0005L7 17M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#939393" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Rok ukończenia: {{ $i->date_end }} r
                                    </li>
                                </ul>
                                @if(1 == 2)
                                    <a href="{{ route('front.developro.completed.show', $i->slug) }}" class="custom-button z-2">Sprawdź</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END -> MAIN SECTION -->
@endsection
