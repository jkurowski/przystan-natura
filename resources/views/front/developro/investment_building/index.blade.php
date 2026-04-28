@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-mieszkania'])

@isset($page)
    @section('meta_title', $page->title.' - '.$investment->name.' - '.$building->name)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('seo_robots', $page->meta_robots)
@endisset

@section('content')
    <div class="container-fluid mieszkania-submenu">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ $investment->name }} - {{$building->name}}</h1>
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
                    @if($building->file)
                        <div id="plan-holder">
                            <img src="{{ asset('/investment/building/'.$building->file) }}" alt="{{$building->name}}" id="invesmentplan" usemap="#invesmentplan" class="w-100 h-100 object-fit-cover rounded">

                            <map name="invesmentplan">
                                @foreach($investment->buildingFloors as $floor)
                                    @if($floor->html)
                                        <area shape="poly" href="{{route('front.developro.building.floor', [$investment->slug, $building, $floor, 'floorSlug' => Str::slug($floor->name)])}}" data-item="{{$floor->id}}" title="{{$floor->name}}" alt="floor-{{$floor->id}}" data-floornumber="{{$floor->id}}" data-floortype="{{$floor->type}}" coords="{{cords($floor->html)}}">
                                    @endif
                                @endforeach
                            </map>
                        </div>
                    @endif

                    @if($building->search_form)
                        @include('front.developro.search.building-search-form')
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
            'investmentName' => $investment->name,
            'investmentId' => $investment->id,
            'emailAddress' => $investment->office_emails,
            'back' => true
        ])
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
@endpush
