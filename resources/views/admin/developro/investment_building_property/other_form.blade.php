@extends('admin.layout')
@section('content')
    @if(Route::is('admin.developro.investment.building.floor.others.edit'))
        <form method="POST" action="{{route('admin.developro.investment.building.floor.others.update', [$investment, $building, $floor, $entry])}}" enctype="multipart/form-data" class="mappa">
            {{method_field('PUT')}}
            @else
                <form method="POST" action="{{route('admin.developro.investment.building.floor.others.store', [$investment, $building, $floor])}}" enctype="multipart/form-data" class="mappa">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card">
                            <div class="card-head container">
                                <div class="row">
                                    <div class="col-12 pl-0">
                                        <h4 class="page-title"><i class="fe-home"></i><a href="{{route('admin.developro.investment.index')}}">Inwestycje</a><span class="d-inline-flex me-2 ms-2">/</span><a href="{{route('admin.developro.investment.floors.index', $investment)}}">{{$investment->name}}</a><span class="d-inline-flex me-2 ms-2">/</span><a href="{{route('admin.developro.investment.properties.index', [$investment, $floor])}}">{{ $floor->name }}</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            @if($floor->file)
                                <div class="card-body">
                                    <div class="mappa-tool">
                                        <div class="mappa-workspace">
                                            <div id="overflow" style="overflow:auto;width:100%;">
                                                <canvas class="mappa-canvas"></canvas>
                                            </div>
                                            <div class="mappa-toolbars">
                                                <ul class="mappa-drawers list-unstyled mb-0">
                                                    <li><input type="radio" name="tool" value="polygon" id="new" class="addPoint input_hidden"/><label for="new" data-toggle="tooltip" data-placement="top" class="actionBtn tip addPoint" title="Służy do dodawanie nowego elementu"><i class="fe-edit-2"></i> Dodaj punkt</label></li>
                                                </ul>
                                                <ul class="mappa-points list-unstyled mb-0">
                                                    <li><input checked="checked" type="radio" name="tool" id="move" value="arrow" class="movePoint input_hidden"/><label for="move" class="actionBtn tip movePoint" data-toggle="tooltip" data-placement="top" title="Służy do przesuwania punktów"><i class="fe-move"></i> Przesuń / Zaznacz</label></li>
                                                    <li><input type="radio" name="tool" value="delete" id="delete" class="deletePoint input_hidden"/><label for="delete" class="actionBtn tip deletePoint" data-toggle="tooltip" data-placement="top" title="Służy do usuwana punków"><i class="fe-trash-2"></i> Usuń punkt</label></li>
                                                </ul>
                                                <ul class="mappa-list list-unstyled mb-0"></ul>
                                                <ul class="mappa-points list-unstyled mb-0">
                                                    <li><a href="#" id="toggleparam" class="actionBtn tip toggleParam" data-toggle="tooltip" data-placement="top" title="Służy do pokazywania/ukrywania parametrów"><i class="fe-repeat"></i> Pokaż / ukryj parametry</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card-body control-col12">
                                <div class="toggleRow w-100">
                                    <div class="row w-100 form-group">
                                        @include('form-elements.mappa', ['label' => 'Współrzędne punktów', 'name' => 'cords', 'value' => $entry->cords, 'rows' => 10, 'class' => 'mappa-html'])
                                    </div>
                                    <div class="row w-100 form-group mb-5">
                                        @include('form-elements.mappa', ['label' => 'Współrzędne punktów HTML', 'name' => 'html', 'value' => $entry->html, 'rows' => 10, 'class' => 'mappa-area'])
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
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
                                    </div>
                                    <div class="container">

                                        <div class="row">
                                            <div class="col-4 mb-4">
                                                @include('form-elements.html-select', ['label' => 'Widoczne', 'name' => 'active', 'selected' => $entry->active, 'select' => [
                                                       '1' => 'Tak',
                                                       '0' => 'Nie'
                                                       ]
                                                   ])
                                            </div>
                                            <div class="col-4 mb-4">
                                                @include('form-elements.html-select', ['label' => 'Typ powierzchni', 'name' => 'type', 'selected' => $entry->type, 'select' => \App\Helpers\PropertyAreaTypes::getOthers()])
                                            </div>
                                            <div class="col-4 mb-3">
                                                @include('form-elements.html-select', [
                                                    'label' => 'Status',
                                                    'name' => 'status',
                                                    'selected' => $entry->status,
                                                    'select' => \App\Helpers\RoomStatusMaper::getAll()
                                                ])
                                            </div>
                                            <div class="col-4 mb-3">
                                                @include('form-elements.html-input-text', [
                                                    'label' => 'Numer ID VOX',
                                                    'name' => 'vox_id',
                                                    'value' => $entry->vox_id
                                                ])
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2>Parametry powierzchni</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                @include('form-elements.input-text', ['label' => 'Nazwa', 'sublabel'=> 'Pełna nazwa', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                            </div>

                                            <div class="col-3">
                                                @include('form-elements.input-text', ['label' => 'Nazwa na liście', 'sublabel'=> 'Miejsce parkingowe, Komórka lokatorska itp', 'name' => 'name_list', 'value' => $entry->name_list, 'required' => 1])
                                            </div>

                                            <div class="col-3">
                                                @include('form-elements.input-text', ['label' => 'Numer', 'sublabel'=> 'Tylko numer, bez nazwy', 'name' => 'number', 'value' => $entry->number, 'required' => 1])
                                            </div>
                                            <div class="col-3">
                                                @include('form-elements.input-text', ['label' => 'Kolejność na liście', 'sublabel'=> 'Tylko liczby', 'name' => 'number_order', 'value' => $entry->number_order, 'required' => 1])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                @include('form-elements.input-text', ['label' => 'Powierzchnia', 'name' => 'area', 'value' => $entry->area, 'required' => 1])
                                            </div>
                                            <div class="col-3">
                                                @include('form-elements.input-text', ['label' => 'Powierzchnia (szukana)', 'name' => 'area_search', 'value' => $entry->area_search, 'required' => 1])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2>Promocje</h2>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                @include('form-elements.html-select', ['label' => 'Promocja', 'name' => 'highlighted', 'selected' => $entry->highlighted, 'select' => [
                                                  '0' => 'Nie',
                                                  '1' => 'Tak'
                                                  ]
                                                ])
                                            </div>
                                            <div class="col-3">
                                                @include('form-elements.html-input-date', ['label' => 'Data zakończenia promocji', 'sublabel'=> '', 'name' => 'promotion_end_date', 'value' => $entry->promotion_end_date])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <div class="col-3">
                                        @include('form-elements.html-select', ['label' => 'Pokaż ceny przy promocji', 'name' => 'promotion_price_show', 'selected' => $entry->promotion_price_show, 'select' => [
                                          '1' => 'Tak',
                                          '0' => 'Nie'
                                          ]
                                        ])
                                    </div>
                                    <div class="col-3">
                                        @include('form-elements.html-input-text', ['label' => 'Cena promocyjna', 'sublabel'=> '', 'name' => 'promotion_price', 'value' => $entry->promotion_price])
                                    </div>
                                    <div class="col-3">
                                        @include('form-elements.html-input-text', ['label' => 'Cena 30 dni', 'sublabel'=> '', 'name' => 'price_30', 'value' => $entry->price_30])
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <div class="col-5">
                                        @include('form-elements.input-text', ['label' => 'Cena brutto', 'sublabel'=> 'Tylko liczby', 'name' => 'price_brutto', 'value' => $entry->price_brutto])
                                    </div>

                                    <div class="col-2">
                                        @include('form-elements.html-select', [
                                        'label' => 'Stawka VAT',
                                        'sublabel'=> 'Wybierz stawkę VAT',
                                        'name' => 'vat',
                                        'selected' => $entry->vat,
                                        'select' => [
                                            '8' => '8%',
                                            '23' => '23%',
                                            '0' => '0%'
                                    ]])
                                    </div>
                                    <div class="col-5">
                                        @include('form-elements.input-text', ['label' => 'Cena netto', 'sublabel'=> 'Tylko liczby', 'name' => 'price', 'value' => $entry->price])
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    <button id="add-price-component"
                                            class="btn btn-primary mt-2"
                                            type="button"
                                            data-price-components='@json($priceComponents)'>
                                        Dodaj dodatkowy składnik ceny
                                    </button>
                                    <div id="price-components">
                                        @foreach($entry->priceComponents as $index => $component)
                                            <div class="row price-component mb-3" data-price-component-id="{{ $component->id }}">
                                                <div class="col-4">
                                                    <label class="control-label">Typ składnika ceny mieszkania:</label>
                                                    <select class="form-select" name="price-component-type[]">
                                                        @foreach($priceComponents as $pc)
                                                            <option value="{{ $pc->id }}" {{ $pc->id == $component->id ? 'selected' : '' }}>
                                                                {{ $pc->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label class="control-label">Rodzaj składnika ceny:</label>
                                                    <select class="form-select" name="price-component-category[]">
                                                        <option value="1" {{ $component->pivot->category == 1 ? 'selected' : '' }}>Obowiązkowy</option>
                                                        <option value="2" {{ $component->pivot->category == 2 ? 'selected' : '' }}>Opcjonalny</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <label class="control-label">Cena za m2 w PLN:</label>
                                                    <input class="form-control" name="price-component-m2-value[]" type="text" value="{{ $component->pivot->value_m2 }}">
                                                </div>
                                                <div class="col-2">
                                                    <label class="control-label">Cena całkowita w PLN:</label>
                                                    <input class="form-control" name="price-component-value[]" type="text" value="{{ $component->pivot->value }}">
                                                </div>
                                                <div class="col-1 text-end">
                                                    <label class="control-label d-block">&nbsp;</label>
                                                    <button class="btn action-button w-100" type="button"><i class="fe-trash-2"></i></button>
                                                </div>
                                                @error('price-component-m2-value.' . $index)
                                                <div class="col-12">
                                                    <div class="text-danger">{{ $message }}</div>
                                                </div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text-count', ['label' => 'Nagłówek strony', 'sublabel'=> 'Meta tag - title', 'name' => 'meta_title', 'value' => $entry->meta_title, 'maxlength' => 60])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text-count', ['label' => 'Opis strony', 'sublabel'=> 'Meta tag - description', 'name' => 'meta_description', 'value' => $entry->meta_description, 'maxlength' => 158])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', [
                                        'label' => 'Plan mieszkania',
                                        'sublabel' => '(wymiary: '.config('images.property_plan.width').'px / '.config('images.property_plan.height').'px)',
                                        'name' => 'file',
                                        'file' => $entry->file,
                                        'file_preview' => config('images.property.preview_file_path')
                                    ])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file-pdf', [
                                        'label' => 'Plan .pdf',
                                        'sublabel' =>
                                        'Plan do pobrania',
                                        'name' => 'file_pdf',
                                        'file' => $entry->file_pdf,
                                        'file_preview' => config('images.property.preview_pdf_path')
                                    ])
                                </div>
                                <div class="row w-100 form-group">
                                    <h2 class="mb-3">Opis</h2>
                                    @include('form-elements.textarea-fullwidth', ['label' => 'Opis mieszkania', 'name' => 'text', 'value' => $entry->text, 'rows' => 21, 'class' => 'tinymce'])
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="floor_id" value="{{ $floor->id }}">
                        <input type="hidden" name="building_id" value="{{ $building->id }}">
                        <input type="hidden" name="investment_id" value="{{ $investment->id }}">
                        <input type="hidden" name="rooms" value="1">
                        <input type="hidden" name="visitor_related_type" value="0">
                        @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                    </div>
                </form>
                @endsection
                @push('scripts')
                    <script src="{{ asset('/js/typeahead.min.js') }}" charset="utf-8"></script>
                    <script src="{{ asset('/js/plan/underscore.js') }}" charset="utf-8"></script>
                    <script src="{{ asset('/js/plan/mappa-backbone.js') }}" charset="utf-8"></script>
                    <script src="{{ asset('/js/datepicker/bootstrap-datepicker.min.js') }}" charset="utf-8"></script>
                    <script src="{{ asset('/js/datepicker/bootstrap-datepicker.pl.min.js') }}" charset="utf-8"></script>
                    <link href="{{ asset('/js/datepicker/bootstrap-datepicker3.css') }}" rel="stylesheet">
                    <link href="{{ asset('/js/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
                    <script src="{{ asset('/js/bootstrap-select/bootstrap-select.min.js') }}" charset="utf-8"></script>
                    <script src="{{ asset('/js/inputmask.min.js') }}"></script>
                    <script type="text/javascript">
                        const map = {
                            "name":"imagemap",
                            "areas":[{!! $entry->cords !!}]
                        };
                        const added = document.getElementById('added');

                        $(document).ready(function() {
                            @if($floor->file)
                            const mapview = new MapView({el: '.mappa'}, map);
                            mapview.loadImage('/investment/floor/{{$floor->file}}');
                            @endif
                        });
                        function roundAreaValue() {
                            const areaInput = document.getElementById('form_area');
                            const areaSearchInput = document.getElementById('form_area_search');
                            const areaValue = parseFloat(areaInput.value);
                            if (!isNaN(areaValue)) {
                                areaSearchInput.value = Math.round(areaValue);
                            }
                        }
                        document.getElementById('form_area').addEventListener('input', roundAreaValue);
                        window.addEventListener('load', roundAreaValue);

                        function clearTextInputs(divElementId) {
                            const textInputs = divElementId.getElementsByTagName('input');
                            for (let i = 0; i < textInputs.length; i++) {
                                if (textInputs[i].type === 'text') {
                                    textInputs[i].value = '';
                                }
                            }
                        }
                        $(document).ready(function() {
                            $('.select-related').selectpicker();

                            $('.datepicker').datepicker({
                                format: 'yyyy-mm-dd',
                                todayHighlight: true,
                                language: "pl"
                            });

                            const priceBruttoInput = document.getElementById("form_price_brutto");
                            const priceNettoInput = document.getElementById("form_price");
                            const vatRateSelect = document.getElementById("vatSelect");

                            function calculateNetto(brutto, vatRate) {
                                const vatMultiplier = 1 + vatRate / 100;
                                return brutto / vatMultiplier;
                            }

                            function updateNettoPrice() {
                                const bruttoValue = parseFloat(priceBruttoInput.value) || 0;
                                const vatRateValue = parseFloat(vatRateSelect.value) || 0;
                                const nettoValue = calculateNetto(bruttoValue, vatRateValue);
                                priceNettoInput.value = nettoValue.toFixed(2);
                            }

                            updateNettoPrice();
                            priceBruttoInput.addEventListener("input", updateNettoPrice);
                            vatRateSelect.addEventListener("change", updateNettoPrice);

                            const statusSelect = document.getElementById('statusSelect');
                            const formSaleInput = document.getElementById('formSaleInput');
                            const formReservationInput = document.getElementById('formReservationInput');

                            function clearDateInputs() {
                                clearTextInputs(formSaleInput);
                                clearTextInputs(formReservationInput);
                            }

                            statusSelect.addEventListener('change', clearDateInputs);
                        });
                    </script>
                    <script>
                        const addButton = document.getElementById('add-price-component');
                        const priceComponents = JSON.parse(addButton.dataset.priceComponents);

                        addButton.addEventListener('click', () => {
                            const id = Math.floor(Math.random() * 1000);
                            const optionsHtml = priceComponents.map(pc =>
                                `<option value="${pc.id}">${pc.name}</option>`
                            ).join('');

                            const PriceComponent = () => `
                          <div class="row price-component mb-3" data-price-component-id="${id}">
                            <div class="col-4">
                                <label class="control-label">Typ składnika ceny mieszkania:</label>
                                <select class="form-select" name="price-component-type[]">
                                    ${optionsHtml}
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="control-label">Rodzaj składnika ceny:</label>
                                <select class="form-select" name="price-component-category[]">
                                    <option value="1">Obowiązkowy</option>
                                    <option value="2">Opcjonalny</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label class="control-label">Cena za m² w PLN:</label>
                                <input class="form-control" name="price-component-m2-value[]" type="text" autocomplete="off">
                            </div>
                            <div class="col-2">
                                <label class="control-label">Cena całkowita w PLN:</label>
                                <input class="form-control" name="price-component-value[]" type="text" autocomplete="off">
                            </div>
                            <div class="col-1 text-end">
                                <label class="control-label d-block">&nbsp;</label>
                                <button class="btn action-button w-100" type="button"><i class="fe-trash-2"></i></button>
                            </div>
                          </div>
                        `;
                            document.getElementById('price-components').insertAdjacentHTML('beforeend', PriceComponent());
                        });

                        document.addEventListener('click', function(e) {
                            if (e.target.closest('.action-button')) {
                                const component = e.target.closest('.price-component');
                                if (component) component.remove();
                            }
                        });
                        document.addEventListener('input', function(e) {
                            const areaInput = document.getElementById('form_area');
                            const area = parseFloat(areaInput.value.replace(',', '.'));

                            if (isNaN(area) || area <= 0) return; // Nie liczymy jeśli powierzchnia jest nieprawidłowa

                            function parseValue(val) {
                                return parseFloat(val.replace(',', '.')) || 0;
                            }

                            if (e.target.matches('input[name="price-component-value[]"]')) {
                                const value = parseValue(e.target.value);
                                const row = e.target.closest('.row.price-component');
                                if (!row) return;
                                const m2Input = row.querySelector('input[name="price-component-m2-value[]"]');
                                if (!m2Input) return;

                                const m2Value = value / area;
                                m2Input.value = m2Value > 0 ? m2Value.toFixed(2) : '';
                            }

                            if (e.target.matches('input[name="price-component-m2-value[]"]')) {
                                const m2Value = parseValue(e.target.value);
                                const row = e.target.closest('.row.price-component');
                                if (!row) return;
                                const valueInput = row.querySelector('input[name="price-component-value[]"]');
                                if (!valueInput) return;

                                const totalValue = m2Value * area;
                                valueInput.value = totalValue > 0 ? totalValue.toFixed(2) : '';
                            }
                        });
                    </script>
        @endpush
