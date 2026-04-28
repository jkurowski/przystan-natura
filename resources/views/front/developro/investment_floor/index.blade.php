@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-mieszkania'])

{{--@section('meta_title', $page->title.' - '.$investment->name)--}}
{{--@section('seo_title', $page->meta_title)--}}
{{--@section('seo_description', $page->meta_description)--}}
{{--@section('seo_robots', $page->meta_robots)--}}

@section('content')
    <main class="overflow-hidden">
        <!-- BREADCRUMB -->
        <div class="container breadcrumb-section">
            <div class="row">
                <div class="col-12">
                    <a href="/">Strona główna</a> / Inwestycje / {{ $investment->name }} / {{$investment->floor->name}}
                </div>
            </div>
        </div>

        <!-- MENU TABS -->
        @include('front.developro.investment_shared.menu')
        <!-- ENTRY -->

        <!-- ENTRY -->
        <div class="container-fluid mieszkania-section">
            <div class="container mb-5">
                <div id="planNav" class="row">
                    <div class="col-6 col-sm-4">
                        @if($prev_floor)
                            <a href="{{route('front.developro.floor', [$investment->slug, $prev_floor, 'floorSlug' => Str::slug($prev_floor->name)])}}" class="custom-button z-2">
                                Piętro niżej
                            </a>
                        @endif
                    </div>

                    <div class="col-12 col-sm-4 text-center order-first order-sm-0">
                        <a href="{{route('front.developro.plan', $investment->slug)}}?status=1#invesmentplan" class="custom-button z-2" style="--bs-btn-hover-color: var(--bs-white);">Plan budunku</a>
                    </div>

                    <div class="col-6 col-sm-4 text-end">
                        @if($next_floor)
                            <a href="{{route('front.developro.floor', [$investment->slug, $next_floor, 'floorSlug' => Str::slug($next_floor->name)])}}" class="custom-button z-2">
                                Piętro wyżej
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xxl-10 offset-0 offset-xxl-1 d-flex align-items-center justify-content-center flex-column container-fluid position-relative px-0">
                        <h1 class="text-uppercase mb-20  scroll-anim-top">{{$investment->floor->name}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($investment->floor->file)
                        <div id="plan-holder">
                            <img src="{{ asset('/investment/floor/'.$investment->floor->file) }}" alt="{{$investment->floor->name}}" id="invesmentplan" usemap="#invesmentplan" class="w-100 h-100 object-fit-cover rounded">
                            <map name="invesmentplan">
                                @if($properties)
                                    @foreach($properties as $r)
                                        @if($r->html)
                                            <area
                                                shape="poly"
                                                href="{{ route('front.developro.property', [
                                                    $r->investment->slug,
                                                    $r->floor,
                                                    Str::slug($r->floor->name),
                                                    $r,
                                                    Str::slug($r->name),
                                                    number2RoomsName($r->rooms, true),
                                                    round(floatval($r->area), 2).'-m2'
                                                ]) }}"
                                                data-item="{{$r->id}}"
                                                title="{{$r->name}}<br>Powierzchnia: <b class=fr>{{$r->area}} m<sup>2</sup></b><br />Pokoje: <b class=fr>{{$r->rooms}}</b><br><b>{{ roomStatus($r->status) }}</b>"
                                                alt="{{$r->slug}}"
                                                data-roomnumber="{{$r->number}}"
                                                data-roomtype="{{$r->typ}}"
                                                data-roomstatus="{{$r->status}}"
                                                coords="{{cords($r->html)}}"
                                                class="inline status-{{$r->status}}"
                                            >
                                        @endif
                                    @endforeach
                                @endif
                            </map>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($investment->floor->search_form)
            <!-- WYSZUKIWARKA -->
            @include('front.developro.search.floor-search-form')
        @endif

        <!-- MESZKANIA LIST -->
        <div class="container-fluid mieszkania-list position-relative px-0 mt-20">
            <div class="mieszkania-list__decor">
                <svg xmlns="http://www.w3.org/2000/svg" width="29.426" height="1030.922" viewBox="0 0 29.426 1030.922">
                    <path id="mieszkania-list-svg" d="M1919.5,2977.5h-29.426V2036.515a234.928,234.928,0,0,0,9.984-22.1c3.259-8.174,6.474-17.185,9.3-26.06,5.149-16.178,8.751-31.015,10.145-41.778Z" transform="translate(-1890.074 -1946.578)" fill="#5a5a5a"/>
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-end flex-row gap-10">
                        <img src="{{ asset("img/view-icn-01.svg") }}" alt="" class="mieszkania-list__view-01 active">
                        <img src="{{ asset("img/view-icn-02.svg") }}" alt="" class="mieszkania-list__view-02">
                    </div>
                </div>
                <div class="row mt-20">
                    @foreach($properties as $p)
                        <x-list-property-card :property="$p" />
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/tip.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
@endpush
