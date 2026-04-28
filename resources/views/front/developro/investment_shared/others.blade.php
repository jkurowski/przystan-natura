<div class="modal fade modal-form" id="portletModal" tabindex="-1" aria-labelledby="portletModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <select name="" id="otherSurfaceSelect" class="selectpicker" data-live-search="true" data-size="5">
                    <option value="">Wybierz dodatkową powierzchnię</option>
                    @foreach($others as $o)
                        <option value="{{ $o->id }}">{{ $o->name }}</option>
                    @endforeach
                </select>
                <div id="relatedInfo"></div>
            </div>
            <div class="modal-footer ps-0 pe-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text-start">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary">Dodaj</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
