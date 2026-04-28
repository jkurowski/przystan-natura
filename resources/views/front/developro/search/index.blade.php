@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-mieszkania'])

{{--@section('meta_title', $page->title)--}}
{{--@section('seo_title', $page->meta_title)--}}
{{--@section('seo_description', $page->meta_description)--}}
{{--@section('seo_robots', $page->meta_robots)--}}

@section('content')
    <main class="overflow-hidden">
        <!-- BREADCRUMB -->
        <div class="container breadcrumb-section">
            <div class="row">
                <div class="col-12">
                    <a href="/">Strona główna</a> / Wyniki wyszukiwania
                </div>
            </div>
        </div>

        <div class="container-fluid mieszkania-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xxl-10 offset-0 offset-xxl-1 d-flex align-items-center justify-content-center flex-column container-fluid position-relative px-0">
                        <h1 class="text-uppercase mb-20  scroll-anim-top"> Wyniki wyszukiwania</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- WYSZUKIWARKA -->
        <div class="container-fluid position-relative p-0 home-search">
            <div class="container ">
                <div class="row">
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center scroll-anim-blur">
                        <h2 class="text-uppercase">Wyszukiwarka</h2>
                        <div class="home-search__wrapper w-100 mt-15 mt-md-25">
                            <ul class="nav nav-pills bg-white" id="pills-tab" role="tablist">
                                <li class="nav-item mb-0" role="presentation">
                                    <button class="nav-link {{ (request('type') == 1) ? 'active' : '' }} text-uppercase" id="mieszkania-tab" data-bs-toggle="pill" data-bs-target="#mieszkania" type="button" role="tab" aria-controls="mieszkania" aria-selected="{{ (request('type') == 1) ? 'true' : 'false' }}">mieszkania</button>
                                </li>

                                <li class="nav-item mb-0" role="presentation">
                                    <button class="nav-link {{ (request('type') == 2) ? 'active' : '' }} text-uppercase" id="domy-tab" data-bs-toggle="pill" data-bs-target="#domy" type="button" role="tab" aria-controls="domy" aria-selected="{{ (request('type') == 2) ? 'true' : 'false' }}">domy</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade {{ (request('type') == 1) ? 'show active' : '' }}" id="mieszkania" role="tabpanel" aria-labelledby="mieszkania-tab">
                                    @include('front.developro.search.flat-search-form', [
                                            'tabs' => 0,
                                            'area' => $flatArea,
                                            'price' => $flatPrice,
                                            'rooms' => $flatRooms,
                                            'investmentType' => [1,2],
                                            'searchType' => 1,
                                            'slug' => 0
                                        ]
                                    )
                                </div>

                                <div class="tab-pane fade {{ (request('type') == 2) ? 'show active' : '' }}" id="domy" role="tabpanel" aria-labelledby="domy-tab">
                                    @include('front.developro.search.houses-search-form', [
                                            'tabs' => 0,
                                            'area' => $houseArea,
                                            'price' => $housePrice,
                                            'rooms' => $houseRooms,
                                            'investmentType' => [3],
                                            'searchType' => 2,
                                            'slug' => 0
                                        ]
                                    )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row pb-3 mt-3">
                <div class="col-12">
                    Liczba wyników: {{ $results->sum(fn($result) => $result['properties']->count()) }}
                </div>
            </div>
            <div class="row">
                @foreach ($results as $result)
                    <x-investment-list-item :investment="$result['investment']" :properties="$result['properties']" />
                @endforeach
            </div>
        </div>
    </main>
@endsection
