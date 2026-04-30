@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-oferta'])

@isset($page)
    @section('meta_title', $page->title.' - '.$investment->name.' - Plan inwestycji')
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('seo_robots', $page->meta_robots)
@endisset

@section('pagehader')
    <div id="pageheader">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Oferta domów</h1>
                    <nav class="breadcrumbs">
                        <a href="/">Strona główna</a>
                        <span class="sep">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="#A4804D"/></svg>
                        </span>
                        <span class="current">Oferta domów</span>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pageheader-end"></div>
    </div>
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-text pe-0 text-center">
                        <span>DOSTĘPNOŚĆ</span>
                        <h2>Wybierz dom <i>dla siebie</i></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 pe-4 ps-4">
                    @if($investment->plan)
                        <div id="plan-holder">
                            <img src="{{ asset('/investment/plan/'.$investment->plan->file) }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan" class="w-100 h-100 object-fit-cover rounded">
                            @if($investment->type == 3)
                                <map name="invesmentplan">
                                    @if($investment->properties)
                                        @foreach($investment->properties as $house)
                                            <area
                                                shape="poly"
                                                href="{{route('front.developro.house', [$house, Str::slug($house->name), round(floatval($house->area), 2).'-m2'])}}"
                                                title="{{$house->name}}<br>Powierzchnia: <b class=fr>{{$house->area}} m<sup>2</sup></b><br /><b>{{ roomStatus($house->status) }}</b>"
                                                alt="{{$house->slug}}"
                                                data-roomnumber="{{$house->number}}"
                                                data-roomtype="{{$house->typ}}"
                                                data-roomstatus="{{$house->status}}"
                                                coords="{{ $house->html ? (cords($house->html) ?? '') : '' }}"
                                                class="inline status-{{$house->status}}">
                                        @endforeach
                                    @endif
                                </map>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="container mieszkania-list mt-5">
            <div class="row">
                @if($properties->count() === 0)
                    <p class="text-center text-lg py-3">
                        Brak wyników wyszukiwania, zmień parametry i spróbuj ponownie.
                    </p>
                @else
                    @foreach($properties as $p)

                        <x-list-property-card
                            number="{{ $p->number }}"
                            title="{{ $p->name }}"
                            subtitle="+ wiata garażowa"
                            area="{{ $p->plot_area }} m²"
                            rooms="{{ $p->rooms }}"
                            status="{{ $p->status }}"
                            floors="-"
                            price="{{$p->price_brutto}}"
                            condition="-"
                            pdfUrl="{{ asset('/investment/property/pdf/'.$p->file_pdf) }}"
                            historyUrl="{{ route('front.developro.house', [
                                            $p,
                                            Str::slug($p->name),
                                            round(floatval($p->area), 2).'-m2'
                                        ]) }}"
                            statusClass="status-{{ $p->status }}"
                        />
                    @endforeach
                @endif
            </div>
        </div>

        @include('front.contact.page-contact', [
            'page_name' => $investment->name,
            'investmentName' => $investment->name,
            'investmentId' => $investment->id,
            'emailAddress' => $investment->office_emails,
            'back' => true
        ])
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    @if($investment->type == 3)
        <script src="{{ asset('/js/plan/tip.js') }}" charset="utf-8"></script>
        <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
    @else
        <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
    @endif
@endpush
