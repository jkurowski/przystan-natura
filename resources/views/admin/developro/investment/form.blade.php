@extends('admin.layout')

@section('content')
    @if (Route::is('admin.developro.investment.edit'))
        <form method="POST" action="{{ route('admin.developro.investment.update', $entry->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
        @else
            <form method="POST" action="{{ route('admin.developro.investment.store') }}" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="container">
        <div id="map"></div>

        <div class="card">
            <div class="card-head container">
                <div class="row">
                    <div class="col-12 pl-0">
                        <h4 class="page-title"><i class="fe-book-open"></i><a href="{{ route('admin.developro.investment.index') }}" class="p-0">Inwestycje</a><span class="d-inline-flex ms-2 me-2">/</span>{{ $cardTitle }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            @include('form-elements.back-route-button')
            <div class="card-body control-col12">
                <div class="row w-100">
                    <div class="col-12">
                        <!-- Display all errors at the top -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row w-100 mb-4">
                    <div class="col-12">
                        @include('form-elements.html-input-text', [
                            'label' => 'Link do integracji z VOX',
                            'name' => 'vox_url',
                            'value' => $entry->vox_url
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4">
                    <div class="col-12">
                        @include('form-elements.html-input-text', [
                            'label' => 'Nazwa inwestycji',
                            'name' => 'name',
                            'value' => $entry->name,
                            'required' => 1,
                        ])
                    </div>
                </div>

                <div class="row w-100 form-group">
                    <div class="col-4">@include('form-elements.html-input-text', ['label' => 'Szerokość geograficzna', 'name' => 'lat', 'value' => $entry->lat, 'required' => 1])</div>
                    <div class="col-4">@include('form-elements.html-input-text', ['label' => 'Długość geograficzna', 'name' => 'lng', 'value' => $entry->lng, 'required' => 1])</div>
                    <div class="col-4">@include('form-elements.html-input-text', ['label' => 'Zoom', 'name' => 'zoom', 'value' => $entry->zoom, 'required' => 1])</div>
                </div>

                <div class="row w-100 mb-4">
                    <div class="col-4">
                        @include('form-elements.html-select', [
                            'label' => 'Typ inwestycji',
                            'name' => 'type',
                            'selected' => $entry->type,
                            'select' => [
                                '1' => 'Inwestycja osiedlowa',
                                '2' => 'Inwestycja budynkowa',
                                '3' => 'Inwestycja z domami',
                                '4' => 'Inne oferty',
                                '5' => 'Inwestycja z działkami',
                            ],
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-select', [
                            'label' => 'Status inwestycji',
                            'name' => 'status',
                            'selected' => $entry->status,
                            'select' => [
                                '1' => 'Inwestycja w sprzedaży',
                                '2' => 'Inwestycja zakończona',
                                '3' => 'Inwestycja planowana',
                                '4' => 'Inwestycja ukryta',
                            ],
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4 form-group">
                    <div class="col-12">
                        <h2>Postęp inwestycji</h2>
                    </div>
                    <div class="col-12 mb-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Sub-tytuł sekcji Postęp inwestycji',
                            'sublabel' => 'Krótki zdanie nad paskiem postępu',
                            'name' => 'stages_content',
                            'value' => $entry->stages_content,
                        ])
                    </div>
                    @livewire('investment-stages', ['investment' => $entry])
                </div>

                <div class="row w-100 mb-4">
                    <div class="col-3">
                        @include('form-elements.html-input-text', [
                            'label' => 'Adres inwestycji',
                            'name' => 'address',
                            'value' => $entry->address,
                        ])
                    </div>
                    <div class="col-3">
                        @include('form-elements.html-select', [
                            'label' => 'Miasto inwestycji',
                            'name' => 'city_id',
                            'selected' => $entry->city_id,
                            'select' => $cities_form,
                        ])
                    </div>
                    <div class="col-3">
                        @include('form-elements.html-input-text', [
                            'label' => 'Plakietka inwestycji',
                            'name' => 'entry_content',
                            'value' => $entry->entry_content,
                        ])
                    </div>
                    <div class="col-3">
                        @include('form-elements.html-select', [
                            'label' => 'Lokale usługowe',
                            'name' => 'commercial',
                            'selected' => $entry->commercial,
                            'select' => [
                                '2' => 'Nie',
                                '1' => 'Tak'
                            ],
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4 form-group">
                    <div class="col-12">
                        <h2>Szczegółowe informacje o inwestycji</h2>
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-select', [
                            'label' => 'Województwo lokalizacji',
                            'name' => 'inv_province',
                            'selected' => $entry->inv_province,
                            'select' => $provinces,
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Powiat lokalizacji',
                            'name' => 'inv_county',
                            'value' => $entry->inv_county,
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Gmina lokalizacji',
                            'name' => 'inv_municipality',
                            'value' => $entry->inv_municipality,
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Miejscowość lokalizacji',
                            'name' => 'inv_city',
                            'value' => $entry->inv_city,
                            'required' => 1,
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Ulica lokalizacji',
                            'name' => 'inv_street',
                            'value' => $entry->inv_street,
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Nr nieruchomości lokalizacji',
                            'name' => 'inv_property_number',
                            'value' => $entry->inv_property_number,
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Kod pocztowy lokalizacji',
                            'name' => 'inv_postal_code',
                            'value' => $entry->inv_postal_code,
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-select', [
                            'label' => 'Spółka celowa',
                            'name' => 'company_id',
                            'selected' => $entry->company_id,
                            'select' => $companies,
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-select', [
                            'label' => 'Punkt sprzedaży',
                            'name' => 'sale_point_id',
                            'selected' => $entry->sale_point_id,
                            'select' => $salePoints,
                        ])
                    </div>

                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Numer telefonu',
                            'name' => 'inv_phone',
                            'value' => $entry->inv_phone,
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4">
                    <div class="col-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Termin rozpoczęcia inwestycji',
                            'name' => 'date_start',
                            'value' => $entry->date_start,
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Rok zakończenia inwestycji',
                            'name' => 'date_end',
                            'value' => $entry->date_end,
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-select', [
                            'label' => 'Galeria',
                            'name' => 'gallery_id',
                            'selected' => $entry->gallery_id,
                            'select' => $galeries_form,
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4 form-group">

                    <div class="col-4">
                        @include('form-elements.html-select', [
                            'label' => 'Pokaż wyszukiwarkę',
                            'sublabel' => 'Wyszukiwarka pod planem inwestycji',
                            'name' => 'search_form',
                            'selected' => $entry->search_form,
                            'select' => [
                                '1' => 'Tak',
                                '0' => 'Nie'
                            ]
                        ])
                    </div>

                    <div class="col-4">
                        @include('form-elements.html-select', [
                            'label' => 'Pokaż historię cen',
                            'sublabel' => 'Przycisk Historia ceny na karcie mieszkania',
                            'name' => 'show_pricehistory',
                            'selected' => $entry->show_pricehistory,
                            'select' => [
                                '1' => 'Tak',
                                '0' => 'Nie'
                            ]
                        ])
                    </div>
                    @if (Route::is('admin.developro.investment.edit'))
                        <div class="col-4">
                            @include('form-elements.input-text', [
                                'label' => 'Zakres powierzchni w wyszukiwarce xx-xx',
                                'sublabel' => '(zakresy oddzielone przecinkiem). Min: '.$minArea.' Max: '.$maxArea,
                                'name' => 'area_range',
                                'value' => $entry->area_range,
                            ])
                        </div>
                    @else
                        <div class="col-4">
                            @include('form-elements.input-text', [
                                'label' => 'Zakres powierzchni w wyszukiwarce xx-xx',
                                'sublabel' => '(zakresy oddzielone przecinkiem)',
                                'name' => 'area_range',
                                'value' => $entry->area_range,
                            ])
                        </div>
                    @endif
                    <div class="col-4 d-none">
                        @include('form-elements.html-input-text', [
                            'label' => 'Zakres pokoi w wyszukiwarce',
                            'sublabel' => '(liczby oddzielone przecinkiem)',
                            'name' => 'room_range',
                            'value' => $entry->room_range
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Zakres cen w wyszukiwarce',
                            'sublabel' => '(zakresy oddzielone przecinkiem)',
                            'name' => 'price_range',
                            'value' => $entry->price_range
                        ])
                    </div>
                    <div class="col-4 d-none">
                        @include('form-elements.html-input-text', [
                            'label' => 'Zakres pięter w wyszukiwarce',
                            'sublabel' => '(liczby oddzielone przecinkiem)',
                            'name' => 'floor_range',
                            'value' => $entry->floor_range
                        ])
                    </div>
                    <div class="col-4 mt-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Ilość lokali',
                            'sublabel' => '(tylko liczby)',
                            'name' => 'areas_amount',
                            'value' => $entry->areas_amount,
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4">
                    @include('form-elements.html-input-text', [
                        'label' => 'E-mail do powiadomień',
                        'sublabel' => 'Może być kilka',
                        'name' => 'office_emails',
                        'value' => $entry->office_emails,
                    ])
                </div>

                <div class="row w-100 mb-4 form-group">
                    <div class="col-4">
                        @include('form-elements.input-text', [
                            'label' => 'Youtube - kod filmu',
                            'sublabel' => '',
                            'name' => 'youtube',
                            'value' => $entry->youtube,
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4 form-group">
                    <div class="col-12">
                        <h2>Atuty inwestycji</h2>
                    </div>
                    @livewire('investment-advantages', ['investment' => $entry])
                </div>

                <div class="row w-100 mb-4">
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Atuty inwestycji - treść',
                        'name' => 'advantage_content',
                        'value' => $entry->advantage_content,
                        'rows' => 11,
                        'class' => 'tinymce',
                    ])
                </div>
                <div class="row w-100 mb-4 form-group">
                    @include('form-elements.html-input-file', [
                    'label' => 'Obrazek przy atutach',
                    'sublabel' =>
                        '(wymiary: ' .
                        config('images.investment.advantage_width') .
                        'px / ' .
                        config('images.investment.advantage_height') .
                        'px)',
                    'name' => 'file_advantage',
                    'file' => $entry->file_advantage,
                    'file_preview' => config('images.investment.advantage_preview_file_path'),
                ])
                </div>
                <div class="row w-100 mb-5">
                    <div class="col-4">
                        @include('form-elements.html-input-text-count', [
                            'label' => 'Nagłówek strony',
                            'sublabel' => 'Meta tag - title',
                            'name' => 'meta_title',
                            'value' => $entry->meta_title,
                            'maxlength' => 60,
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-input-text-count', [
                            'label' => 'Opis strony',
                            'sublabel' => 'Meta tag - description',
                            'name' => 'meta_description',
                            'value' => $entry->meta_description,
                            'maxlength' => 158,
                        ])
                    </div>
                    <div class="col-4">
                        @include('form-elements.html-input-text', [
                            'label' => 'Indeksowanie',
                            'sublabel' => 'Meta tag - robots',
                            'name' => 'meta_robots',
                            'value' => $entry->meta_robots,
                        ])
                    </div>
                </div>

                <div class="row w-100 mb-4">
                    @include('form-elements.html-input-file', [
                        'label' => 'Miniaturka',
                        'sublabel' =>
                            '(wymiary: ' .
                            config('images.investment.thumb_width') .
                            'px / ' .
                            config('images.investment.thumb_height') .
                            'px)',
                        'name' => 'file',
                        'file' => $entry->file_thumb,
                        'file_preview' => config('images.investment.preview_file_path'),
                    ])
                </div>

                <div class="row w-100 mb-4">
                    @include('form-elements.html-input-file-pdf', [
                        'label' => 'Prospekt informacyjny',
                        'name' => 'file_brochure',
                        'file' => $entry->file_brochure,
                        'file_preview' => config('images.investment.brochure_file_path')
                    ])
                </div>

                <div class="row w-100 mb-4">
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Opis inwestycji',
                        'name' => 'content',
                        'value' => $entry->content,
                        'rows' => 11,
                        'class' => 'tinymce',
                        'required' => 1,
                    ])
                </div>

                <div class="row w-100 mb-4" wire:ignore>
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Opis inwestycji po zakończeniu',
                        'name' => 'end_content',
                        'value' => $entry->end_content,
                        'rows' => 11,
                        'class' => 'tinymce',
                    ])
                </div>

                <div class="row w-100 mb-4" wire:ignore>
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Lokalizacja',
                        'name' => 'location_content',
                        'value' => $entry->location_content,
                        'rows' => 11,
                        'class' => 'tinymce',
                    ])
                </div>

                <div class="row w-100 mb-4" wire:ignore>
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Dane kontaktowe',
                        'name' => 'contact_content',
                        'value' => $entry->contact_content,
                        'rows' => 11,
                        'class' => 'tinymce',
                    ])
                </div>

                <div class="row w-100 mb-4" wire:ignore>
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Informacja przy każdym mieszkaniu, apartamencie, domu.',
                        'name' => 'property_content',
                        'value' => $entry->property_content,
                        'rows' => 11,
                        'class' => 'tinymce',
                    ])
                </div>

                <div class="row w-100 form-group" wire:ignore>
                    @include('form-elements.textarea-fullwidth', [
                        'label' => 'Kod makiety 3D',
                        'name' => 'mockup',
                        'value' => $entry->mockup,
                        'rows' => 11,
                    ])
                </div>
            </div>
        </div>
    </div>
    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
    </form>
    @include('form-elements.tintmce')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('[name="supervisors"], [name="office_emails"]').tagify({
                'autoComplete.enabled': false
            });
        });
    </script>
    <link href="{{ asset('/css/leaflet.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/leaflet.js') }}" charset="utf-8"></script>
    <script>
        function setOnLoad($lat, $lng, $zoom){
            $('input[name="zoom"]').val($zoom);
            $('input[name="lat"]').val($lat);
            $('input[name="lng"]').val($lng);
            map.setView([$lat, $lng], $zoom);
        }

        function loadInputs($lat, $lng){
            $('input[name="lat"]').val($lat);
            $('input[name="lng"]').val($lng);
        }

        function setZoom($zoom){
            $('input[name="zoom"]').val($zoom);
        }

        let map = L.map('map').setView([52.227388, 21.011063], 13),
            theMarker = {},
            zoom = map.getZoom(),
            latLng = map.getCenter();

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        @if($entry->lat && $entry->lng && $entry->zoom)
        setOnLoad('{{ $entry->lat }}', '{{ $entry->lng }}', '{{ $entry->zoom }}');
        theMarker = L.marker([
            '{{ $entry->lat }}',
            '{{ $entry->lng }}'
        ], {
            draggable:'true'
        }).addTo(map);
        @else
        setOnLoad(latLng.lat, latLng.lng, zoom);
        theMarker = L.marker([
            '52.227388',
            '21.011063'
        ], {
            draggable:'true'
        }).addTo(map);
        @endif

        map.on('zoomend', function() {
            setZoom(map.getZoom());
        });

        map.on('click', function(e) {
            let lat = e.latlng.lat,
                lng = e.latlng.lng;
            loadInputs(lat, lng);

            if (theMarker !== undefined) {
                map.removeLayer(theMarker);
            }
            theMarker = L.marker([lat, lng], {
                draggable:'true'
            }).addTo(map);
        });

        theMarker.on('dragend', function(event) {
            const latlng = event.target.getLatLng();
            loadInputs(latlng.lat, latlng.lng);
        });
    </script>
@endpush
