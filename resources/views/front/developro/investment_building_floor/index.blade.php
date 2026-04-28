@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-mieszkania'])

@isset($page)
    @section('meta_title', $page->title.' - '.$investment->name.' - '.$building->name.' - '.$floor->name)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('seo_robots', $page->meta_robots)
@endisset

@section('content')
    <div class="container-fluid mieszkania-submenu">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ $investment->name }} - {{$building->name}} - {{$floor->name}}</h1>
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
                    <div class="container mb-3">
                        <div id="planNav" class="row">
                            <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                                @if($prev_floor)
                                    <a href="{{route('front.developro.building.floor', [$investment->slug, $building, $prev_floor, 'floorSlug' => Str::slug($prev_floor->name)])}}" class="custom-button z-2 w-100 w-sm-auto justify-content-center">
                                        Piętro niżej
                                    </a>
                                @endif
                            </div>

                            <div class="col-12 col-sm-4 text-center order-first order-sm-0 mb-2 mb-sm-0">
                                <a href="{{route('front.developro.building', [$investment->slug, $building])}}" class="custom-button z-2 w-100 w-sm-auto justify-content-center" style="--bs-btn-hover-color: var(--bs-white);">Plan budunku</a>
                            </div>

                            <div class="col-12 col-sm-4 text-end">
                                @if($next_floor)
                                    <a href="{{route('front.developro.building.floor', [$investment->slug, $building, $next_floor, 'floorSlug' => Str::slug($next_floor->name)])}}" class="custom-button z-2 w-100 w-sm-auto justify-content-center">
                                        Piętro wyżej
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($floor->file)
                        <div id="plan-holder" class="p-2">
                            <picture>
                                @if($floor->file_webp)
                                    <source srcset="{{ asset('/investment/floor/webp/'.$floor->file_webp) }}" type="image/webp">
                                @endif

                                <img
                                    src="{{ asset('/investment/floor/'.$floor->file) }}"
                                    alt="{{ $floor->name }}"
                                    id="invesmentplan"
                                    usemap="#invesmentplan"
                                    class="w-100 h-100 object-fit-cover rounded"
                                >
                            </picture>
                            <map name="invesmentplan">
                                @if($properties)
                                    @foreach($properties as $r)
                                        @if($r->html)
                                            <area
                                                shape="poly"
                                                href="
                                                @if($r->type == 1)
                                                {{ route('front.developro.building.floor.property', [
                                                            $investment->slug,
                                                            $building,
                                                            Str::slug($building->name),
                                                            $r->floor,
                                                            Str::slug($floor->name),
                                                            $r,
                                                            Str::slug($r->name),
                                                            number2RoomsName($r->rooms, true),
                                                            round(floatval($r->area), 2).'-m2'
                                                        ]) }}
                                                        @else # @endif
                                                        "
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

                    @if($investment->floor->search_form)
                        <!-- WYSZUKIWARKA -->
                        @include('front.developro.search.floor-search-form')
                    @endif

                    <div class="container-fluid mieszkania-list">
                            <div class="row">
                                @if($properties->count() === 0)
                                    <p class="text-center text-lg py-3">
                                        Brak wyników wyszukiwania, zmień parametry i spróbuj ponownie.
                                    </p>
                                @else
                                    @foreach($properties as $p)
                                        <x-list-property-card :property="$p" />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM -->
    <div class="pt-5 pt-xxl-6 pb-5 pb-xxl-0">
        @include('front.contact.form', [
            'page_name' => $investment->name,
            'back' => true
        ])
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/tip.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
@endpush
