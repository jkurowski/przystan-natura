@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-karta-mieszkania'])

@isset($page)
    @section('meta_title', $page->title.' - '.$investment->name.' - '.$property->name)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('seo_robots', $page->meta_robots)
@endisset

@section('content')
    <!-- MAIN SECTION -->
    <div class="container-fluid mieszkania-submenu">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ $investment->name }} - {{$property->name}}</h1>
            </div>
        </div>
    </div>

    <div id="page">
        <!-- NAWIGACJA -->
        <div id="planNav" class="container mb-3 mb-sm-5">
            <div class="row">
                <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                    <x-nav-property-link :property="$prev" label="Poprzednie" direction="prev" />
                </div>
                <div class="col-12 col-sm-4 text-center order-first order-sm-0 mb-2 mb-sm-0">
                    @if($investment->type == 1)
                        <a href="{{route('front.developro.building.floor', [$investment->slug, $building, 'buildingSlug' => Str::slug($building->name), $floor, 'floorSlug' => Str::slug($floor->name)])}}" class="next-prev__link d-flex align-items-center justify-content-center gap-2 w-100 w-sm-auto justify-content-center">
                            Plan piętra
                        </a>
                    @endif
                    @if($investment->type == 2)
                        <a href="{{route('front.developro.floor', [$investment->slug, $floor, 'floorSlug' => Str::slug($floor->name)])}}" class="custom-button">
                            Plan piętra
                        </a>
                    @endif
                </div>
                <div class="col-12 col-sm-4 text-end">
                    <x-nav-property-link :property="$next" label="Następne" direction="next" />
                </div>
            </div>
        </div>

        <!-- ENTRY -->
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-xl-8">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                            <div class="page-entry-karta__item">
                                <x-icons.icon-area/>
                                <span>Powierzchnia: {{$property->area}} m<sup>2</sup></span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                            <div class="page-entry-karta__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36.343" height="36.343" viewBox="0 0 36.343 36.343">
                                    <g id="pokoje-icn" transform="translate(0.75 0.75)">
                                        <path id="Path_28" data-name="Path 28" d="M25,15.356V2H46.486V24.648H40.1V36.843H34.872" transform="translate(-11.644 -2)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                        <path id="Path_29" data-name="Path 29" d="M23.486,37.971,20,41.455H2V13H15.356" transform="translate(-2 -6.612)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                        <path id="Path_30" data-name="Path 30" d="M25,34v7.549" transform="translate(-11.644 -15.417)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                        <path id="Path_31" data-name="Path 31" d="M25,56v3.484" transform="translate(-11.644 -24.641)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                        <path id="Path_32" data-name="Path 32" d="M15.356,41H2" transform="translate(-2 -18.352)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    </g>
                                </svg>
                                <span>Pokoje: {{$property->rooms}}</span>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="page-entry-karta__item">
                                <x-icons.icon-floor/>
                                <span>Piętro: {{$floor->number}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="row">
                        <div class="col-12 col-lg-5 d-flex flex-column align-items-start justify-content-start">

                            @if($property->status == 1)
                                @if($property->highlighted && $property->promotion_price)
                                    <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100" style="color: #FF0000">
                                        <span>Cena promocyjna</span>
                                        <span><b>@money($property->promotion_price)</b></span>
                                    </div>
                                @endif

                                @php
                                    $area = (float) str_replace(',', '.', $property->area);
                                @endphp

                                @if($property->highlighted && $property->promotion_price && $area > 0)
                                    <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100" style="color: #FF0000">
                                        <span>Cena promocyjna za m<sup>2</sup></span>
                                        <span><b>@money($property->promotion_price / $area)</b></span>
                                    </div>
                                @endif

                                @if($property->price_brutto)
                                    <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100 @if($property->highlighted) text-decoration-line-through text-muted @endif">
                                        <span>Cena</span>
                                        <span><b>@money($property->price_brutto)</b></span>
                                    </div>
                                @endif

                                @php
                                    $area = (float) str_replace(',', '.', $property->area);
                                @endphp

                                @if($property->price_brutto && $area > 0)
                                    <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100 @if($property->highlighted) text-decoration-line-through text-muted @endif">
                                        <span>Cena za m<sup>2</sup></span>
                                        <span><b>@money($property->price_brutto / $area)</b></span>
                                    </div>
                                @endif
                            @endif

                            @if($property->kitchen)
                                <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100">
                                    <span>Aneks/Kuchnia</span>
                                    <span><b>{{ kitchenType($property->kitchen) }}</b></span>
                                </div>
                            @endif

                            @if($property->terrace_area)
                                <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100">
                                    <span>Taras</span>
                                    <span><b>{{$property->terrace_area}} m<sup>2</sup></b></span>
                                </div>
                            @endif

                            @if($property->garden_area)
                                <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100">
                                    <span>Ogród</span>
                                    <span><b>{{$property->garden_area}} m<sup>2</sup></b></span>
                                </div>
                            @endif

                            @if($property->balcony_area)
                                <div class="page-entry-karta__info-item d-flex flex-column flex-sm-row justify-content-start justify-content-sm-between align-items-center align-items-sm-end w-100">
                                    <span>Balkon</span>
                                    <span><b>{{$property->balcony_area}} m<sup>2</sup></b></span>
                                </div>
                            @endif

                            @if ($property->status == 1 && $property->type == 1 && $property->relatedProperties->isNotEmpty())
                                <div class="property-related mt-4 w-100">
                                    @if($property->relatedProperties->isNotEmpty())
                                        <h5>Przynależne powierzchnie</h5>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Nazwa</th>
                                                <th class="text-center">Powierzchnia</th>
                                                <th class="text-center">Cena</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($property->relatedProperties as $related)
                                                <tr>
                                                    <td valign="middle">{{ $related->name }}</td>
                                                    <td class="text-center" valign="middle">{{ $related->area }} m<sup>2</sup></td>
                                                    <td class="text-center" valign="middle">
                                                        @money($related->price_brutto)
                                                    </td>
                                                    <td valign="middle" align="right">
                                                        @if($related->has_price_history)
                                                            <a href="#" class="btn-history" data-id="{{ $related->id }}"><svg class="d-block" width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill="#000000" d="M10.6972,0.468433 C12.354,1.06178 13.7689,2.18485 14.7228,3.66372 C15.6766,5.14258 16.1163,6.89471 15.9736,8.64872 C15.8309,10.4027 15.1138,12.0607 13.9334,13.366 C12.753,14.6712 11.1752,15.5508 9.4443,15.8685 C7.71342,16.1863 5.92606,15.9244 4.35906,15.1235 C2.79206,14.3226 1.53287,13.0274 0.776508,11.4384 C0.539137,10.9397 0.750962,10.343 1.24963,10.1057 C1.74831,9.86829 2.34499,10.0801 2.58236,10.5788 C3.14963,11.7705 4.09402,12.742 5.26927,13.3426 C6.44452,13.9433 7.78504,14.1397 9.08321,13.9014 C10.3814,13.6631 11.5647,13.0034 12.45,12.0245 C13.3353,11.0456 13.8731,9.80205 13.9801,8.48654 C14.0872,7.17103 13.7574,5.85694 13.042,4.74779 C12.3266,3.63864 11.2655,2.79633 10.0229,2.35133 C8.78032,1.90632 7.42568,1.88344 6.1688,2.28624 C5.34644,2.54978 4.59596,2.98593 3.96459,3.5597 L4.69779,4.29291 C5.32776,4.92287 4.88159,6.00002 3.99069,6.00002 L1.77635684e-15,6.00002 L1.77635684e-15,2.00933 C1.77635684e-15,1.11842 1.07714,0.672258 1.70711,1.30222 L2.54916,2.14428 C3.40537,1.3473 4.43126,0.742882 5.55842,0.381656 C7.23428,-0.155411 9.04046,-0.124911 10.6972,0.468433 Z M8,4 C8.55229,4 9,4.44772 9,5 L9,7.58579 L10.7071,9.29289 C11.0976,9.68342 11.0976,10.3166 10.7071,10.7071 C10.3166,11.0976 9.68342,11.0976 9.29289,10.7071 L7,8.41421 L7,5 C7,4.44772 7.44772,4 8,4 Z"/>
                                                                </svg></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif

                                    @if($property->visitor_related_type == 9999)
                                        <div class="property-offer-check">
                                            <p>Dodanie powierzchni dodatkowych służy jedynie orientacyjnej wycenie. Ostateczna oferta oraz warunki zakupu zostaną przedstawione przez przedstawiciela sprzedaży.</p>
                                            <a href="#" class="btn btn-primary btn-with-icon px-3 min-w-max-content flex-fill d-inline-flex align-items-center justify-content-center gap-1 btn-offer" data-id="{{ $property->id }}">Dodaj do oferty</a>
                                            <div id="offerModal"></div>
                                            <table class="table d-none mt-3">
                                                <thead>
                                                <tr>
                                                    <th>Nazwa</th>
                                                    <th class="text-center">Powierzchnia</th>
                                                    <th class="text-center">Cena</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="offerList"></tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if($property->priceHistory->count() > 0 && $property->status == 1 && $investment->show_pricehistory)
                                <div>
                                    <button type="button" class="custom-button mt-0mt-md-10" data-bs-toggle="modal" data-bs-target="#priceHistoryModal">Historia ceny</button>
                                </div>
                            @endif
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-12">
                                        @if($property->file_pdf)
                                            <a href="{{ asset('/investment/property/pdf/'.$property->file_pdf) }}" class="bttn bttn-icon bttn-white mt-5" target="_blank">
                                                @if($property->is_investment_property)
                                                    Pobierz plan apartamentu
                                                @else
                                                    Plan mieszkania .pdf
                                                @endif
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#sendIcon)"><path d="M4.9776 4.25018L4.97086 6.26437L9.35486 6.26437L3.55046 12.0688L4.96731 13.4856L10.7717 7.68122L10.7717 12.0652L12.7859 12.0585L12.777 4.25905L4.9776 4.25018Z"></path></g><defs><clipPath id="sendIcon"><rect width="12.0465" height="12.0465" transform="translate(0 8.51855) rotate(-45)"></rect></clipPath></defs></svg></span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        @if($investment->file_brochure)
                                            <a href="{{ asset('investment/brochure/'.$investment->file_brochure) }}" class="bttn bttn-icon bttn-white mt-3" target="_blank">Prospekt informacyjny <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#sendIcon)"><path d="M4.9776 4.25018L4.97086 6.26437L9.35486 6.26437L3.55046 12.0688L4.96731 13.4856L10.7717 7.68122L10.7717 12.0652L12.7859 12.0585L12.777 4.25905L4.9776 4.25018Z"></path></g><defs><clipPath id="sendIcon"><rect width="12.0465" height="12.0465" transform="translate(0 8.51855) rotate(-45)"></rect></clipPath></defs></svg></span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-7 mt-4 mt-lg-0 ps-2 ps-lg-4">
                            @if($property->file)
                                <div class="room-plan-img">
                                    <a href="{{ asset('/investment/property/'.$property->file) }}" data-lightbox="property" rel="property" class="d-block m-auto">
                                        <picture>
                                            @if($property->file_webp)
                                                <source type="image/webp" srcset="{{ asset('/investment/property/thumbs/webp/'.$property->file_webp) }}">
                                            @endif
                                            <source type="image/jpeg" srcset="{{ asset('/investment/property/thumbs/'.$property->file) }}">
                                            <img src="{{ asset('/investment/property/thumbs/'.$property->file) }}" alt="{{$property->name}}" loading="lazy" decoding="async" class="mieszkania-list__img">
                                        </picture>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($property->text)
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-10 col-xxl-8 mt-5">
                        {!! parse_text($property->text, true) !!}
                    </div>
                </div>
            @endif
            @if($investment->property_content)
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-10 col-xxl-8 mt-5">
                        {!! $investment->property_content !!}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="pt-5 pt-xxl-6 pb-5 pb-xxl-0">
        @include('front.contact.form', [
            'page_name' => $property->name,
            'property' => $property->id,
            'back' => true
        ])
    </div>

    <!-- END -> MAIN SECTION -->
    @if($property->priceHistory->count() > 0 && $property->status == 1 && $investment->show_pricehistory)
    <div class="modal fade" id="priceHistoryModal" tabindex="-1" aria-labelledby="priceHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="priceHistoryModalLabel">Historia ceny: {{ $property->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Stara cena</th>
                                    <th>Nowa cena</th>
                                    <th>Data zmiany</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($property->priceHistory as $history)
                                    <tr>
                                        <td>
                                            @if($history->price_before_gross < $history->price_gross)
                                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" stroke="#ae1515" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-arrow-up-right">
                                                    <line x1="7" y1="17" x2="17" y2="7" />
                                                    <polyline points="7 7 17 7 17 17" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                     viewBox="0 0 24 24" stroke="#00a304" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-arrow-down-right">
                                                    <line x1="7" y1="7" x2="17" y2="17"></line>
                                                    <polyline points="17 7 17 17 7 17"></polyline>
                                                </svg>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $history->price_before_gross }} zł
                                            <small class="d-inline-block w-100">{{ $history->price_before_per_mkw }} zł/m<sup>2</sup></small>
                                        </td>
                                        <td>
                                            {{ $history->price_gross }} zł
                                            <small class="d-inline-block w-100">{{ $history->price_per_mkw }} zł/m<sup>2</sup></small>
                                        </td>
                                        <td>
                                            {{ $history->formatted_date_modified }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="custom-button mt-0mt-md-10" data-bs-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@push('scripts')
    <link href="{{ asset('/css/history.min.css') }}?v=11122025" rel="stylesheet">
@endpush
