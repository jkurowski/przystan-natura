<div>
    {{-- FORMULARZ --}}
    <div class="row p-4 border-bottom">
        {{-- KATEGORIA --}}
        <div class="col">
            <label class="mb-2">Kategoria</label>
            <select wire:model="category" class="form-select">
                <option value="1">Mieszkania</option>
                <option value="2">Domy</option>
            </select>
        </div>

        {{-- TYP --}}
        <div class="col">
            <label class="mb-2">Typ pola</label>
            <select wire:model="type" class="form-select">
                <option value="">-- wybierz --</option>
                <option value="1">Powierzchnia</option>
                <option value="2">Cena</option>
                <option value="3">Liczba pokoi</option>
            </select>
        </div>

        {{-- ETYKIETA --}}
        <div class="col">
            <label class="mb-2">Etykieta</label>
            <input type="text"
                   wire:model="label"
                   class="form-control"
                   oninput="@this.set('value', this.value.replace(/[^0-9-]/g,'').replace(/-+/g,'-'))">
        </div>

        {{-- WARTOŚĆ --}}
        <div class="col">
            <label class="mb-2">Wartość</label>
            <input type="text" wire:model="value" class="form-control">
        </div>

        <div class="col">
            <label class="mb-2">&nbsp;</label>
            <button wire:click="saveField" class="btn btn-primary w-100">
                {{ $editingId ? "Zapisz zmiany" : "Dodaj pole" }}
            </button>
        </div>
    </div>


    {{-- LISTY --}}
    <div class="p-4 pt-0">
        @foreach ([1 => 'Mieszkania', 2 => 'Domy'] as $cat => $label)
            <div class="my-6">
                <div class="col-12">
                    <div class="section mb-3 d-flex">
                        {{ $label }}
                        <input type="checkbox"
                               wire:click="toggleCategory({{ $cat }})"
                               {{ $categoriesActive[$cat] ? 'checked' : '' }}
                               class="ms-auto">
                    </div>
                </div>

                <div class="row">
                    @php
                        $fieldsByType = [
                            1 => $fieldsByCategory[$cat]->where('type', 1),
                            2 => $fieldsByCategory[$cat]->where('type', 2),
                            3 => $fieldsByCategory[$cat]->where('type', 3),
                        ];
                    @endphp

                    @foreach ([1 => 'Powierzchnia', 2 => 'Cena', 3 => 'Liczba pokoi'] as $type => $typeLabel)
                        <div class="col-md-4">
                            <h4 class="mb-3"><b>{{ $typeLabel }}</b></h4>
                            <div id="sortable-{{ $cat }}-{{ $type }}" data-category="{{ $cat }}" data-type="{{ $type }}" class="sortable-list">
                                @foreach ($fieldsByType[$type] as $field)
                                    <div wire:key="field-{{ $field->id }}" class="border mb-2 bg-white flex justify-between items-center" data-id="{{ $field->id }}">
                                        <div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Tekst wyświetlany: <b>{{ $field->label }}</b></li>
                                                <li class="list-group-item">Wartość: <b>{{ $field->value }}</b></li>
                                                <li class="list-group-item">
                                                    <button wire:click="edit({{ $field->id }})" class="btn btn-sm btn-primary">Edytuj</button>
                                                    <button wire:click="delete({{ $field->id }})" class="btn btn-sm btn-primary">Usuń</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</div>
@push('scripts')
    <script>
        $(function() {
            console.log('jQuery działa!');
            $('.sortable-list').sortable({
                cursor: "move",
                zIndex: 9999,
                dropOnEmpty: false,
                update: function() {
                    let category = $(this).data('category');
                    let orderedIds = $(this).children().map(function () {
                        return $(this).data('id');
                    }).get();

                    window.dispatchEvent(new CustomEvent('sortItems', {
                        detail: { category, orderedIds }
                    }));
                }
            });
        });
    </script>
@endpush
