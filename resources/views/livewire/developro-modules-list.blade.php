<div>
    <form wire:submit.prevent="save">
        <table class="table mb-0">
            <thead class="thead-default">
            <tr>
                <th scope="col">Aktywny</th>
                <th scope="col">Nazwa</th>
                <th scope="col">URL</th>
            </tr>
            </thead>
            <tbody class="content">
            @foreach ($modules as $index => $module)
                <tr wire:key="row-{{ $module['id'] }}">
                    <td class="position">
                        <input type="checkbox"
                               wire:key="active-{{ $module['id'] }}"
                               wire:model="modules.{{ $index }}.active"
                               value="1">
                    </td>

                    <td class="control-input">
                        <input type="text"
                               wire:model="modules.{{ $index }}.name"
                               class="form-control"
                            @disabled(!$module['active'])>
                    </td>

                    <td class="control-input">
                        <input type="text"
                               wire:model="modules.{{ $index }}.url"
                               class="form-control"
                            @disabled(!$module['active'])>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-group form-group-submit">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', ({ message }) => {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "3000"
                };
                toastr.success(message);
            });
        });
    </script>
</div>
