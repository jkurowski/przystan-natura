<div>
    <div class="row">
        <div class="col-2">
            <div class="advantage h-100 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-primary" wire:click="openModal" wire:loading.attr="disabled">Dodaj atut</button>
            </div>
        </div>
        @foreach($advantages as $adv)
        <div class="col-2">
            <div class="advantage">
                @if($adv->image)
                    <img src="{{ asset('/investment/advantages/'.$adv->image) }}" width="60" alt="{{ $adv->title }}">
                @else
                    <span class="no-thumb d-flex bg-body-secondary align-items-center justify-content-center text-center rounded-1" style="width:65px;height:65px">Brak</span>
                @endif
                <span>{{ $adv->image_title }}</span>
                <hr>
                <h3>{{ $adv->title }}</h3>
                <p>{{ $adv->subtitle }}</p>
                <div class="advantage-footer option-120">
                    <div class="btn-group">
                        <button class="btn btn-primary action-button me-1"
                                type="button"
                                wire:click="editAdvantage({{ $adv->id }})">
                            <i class="fe-edit" aria-hidden="true"></i>
                        </button>
                        <button class="btn bg-danger action-button"
                                type="button"
                                wire:click="delete({{ $adv->id }})"
                                wire:confirm="Na pewno chcesz usunąć ten atut?">
                            <i class="fe-trash-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade @if($showModal) show d-block @endif" tabindex="-1" @if($showModal) style="background: rgba(0,0,0,.5);" @endif>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Dodaj atut inwestycji</h5>
                        <button type="button" class="btn-close" wire:click="$set('showModal', false)"><i class="fe-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tytuł</label>
                            <input type="text" class="form-control" wire:model="title">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Podtytuł</label>
                            <input type="text" class="form-control" wire:model="subtitle">
                        </div>
                        <div class="mb-3">
                            <label>Obrazek (ikona)</label>
                            <input type="file" wire:model.defer="image" class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            @if ($imagePath)
                                <div class="mt-2">
                                    <p>Aktualny obrazek:</p>
                                    <img src="{{ asset('investment/advantages/' . $imagePath) }}" alt="" style="max-height: 80px;">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label>Tytuł obrazka</label>
                            <input type="text" class="form-control" wire:model="image_title">
                        </div>
                        <div class="mb-3">
                            <label>Pozycja</label>
                            <input type="number" class="form-control" wire:model="position">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="save">Zapisz</button>
                        <button type="button" class="btn btn-secondary" wire:click="$set('showModal', false)">Anuluj</button>
                    </div>
            </div>
        </div>
    </div>
</div>
