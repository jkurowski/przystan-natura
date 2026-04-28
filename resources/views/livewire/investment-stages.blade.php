<div>
    <div class="row">
        <div class="col-2">
            <div class="advantage h-100 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-primary" wire:click="openModal" wire:loading.attr="disabled">
                    Dodaj etap
                </button>
            </div>
        </div>
        @foreach($stages as $stage)
            <div class="col-2">
                <div class="advantage p-2 border rounded text-center">
                    <strong>{{ $stage->name }}</strong>
                    <hr>
                    <p><b>Data:</b> {{ $stage->date }}</p>
                    <p><b>Procent:</b> {{ $stage->percent }}%</p>
                    <div class="stage-footer option-120 mt-2">
                        <div class="btn-group">
                            <button class="btn btn-primary action-button me-1"
                                    type="button"
                                    wire:click="editStage({{ $stage->id }})">
                                <i class="fe-edit" aria-hidden="true"></i>
                            </button>
                            <button class="btn bg-danger action-button"
                                    type="button"
                                    wire:click="delete({{ $stage->id }})"
                                    wire:confirm="Na pewno chcesz usunąć ten etap?">
                                <i class="fe-trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade @if($showStageModal) show d-block @endif"
         tabindex="-1"
         @if($showStageModal) style="background: rgba(0,0,0,.5);" @endif>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $stageId ? 'Edytuj etap inwestycji' : 'Dodaj etap inwestycji' }}</h5>
                    <button type="button" class="btn-close" wire:click="$set('showStageModal', false)">
                        <i class="fe-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nazwa etapu</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Data (np. 31-12-2025)</label>
                        <input type="text" class="form-control" wire:model="date" placeholder="dd-mm-rrrr">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Procent</label>
                        <input type="number" class="form-control" wire:model="percent" min="0" max="100" step="0.01">
                        @error('percent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3" wire:ignore>
                        <label>Treść</label>
                        <textarea class="form-control smalltinymce" rows="5"></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Pozycja</label>
                        <input type="number" class="form-control" wire:model="position">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click="save">Zapisz</button>
                    <button type="button" class="btn btn-secondary" wire:click="$set('showStageModal', false)">Anuluj</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        console.log('Livewire + TinyMCE script loaded');

        if (window.Livewire && Livewire.hook) {
            Livewire.hook('message.processed', (message, component) => {
                console.log('Livewire message processed');
            });
        }

        function initLivewireTiny() {
            console.log("Init TinyMCE...");
            tinymce.init({
                selector: '.smalltinymce',
                language: 'pl',
                menubar: false,
                statusbar: false,
                height: 200,
                branding: false,
                toolbar_location: 'bottom',
                plugins: '',
                toolbar: "bold italic underline | alignleft aligncenter alignright | bullist numlist",

                setup: function (editor) {
                    editor.on('init', function () {
                        editor.setContent(@this.get('content') ?? '');
                    });

                    editor.on('keyup change', function () {
                        console.log("TinyMCE change:", editor.getContent());
                        @this.set('content', editor.getContent());
                    });
                }
            });
        }

        Livewire.on('openStageModal', () => {
            console.log("Event: openStageModal triggered");
            setTimeout(() => {
                tinymce.remove('.smalltinymce');
                initLivewireTiny();
            }, 150);
        });

        // Jeżeli Livewire jest już załadowany, uruchom od razu initLivewireTiny albo obsługę eventów
        if (window.Livewire) {
            console.log('Livewire already loaded');
        } else {
            document.addEventListener('livewire:load', function () {
                console.log('Livewire loaded');
            });
        }
    </script>
@endpush
