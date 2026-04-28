<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DeveloproModule;

class DeveloproModulesList extends Component
{
    public $modules = [];

    public function mount()
    {
        $this->modules = DeveloproModule::all()->map(fn($m) => [
            'id' => $m->id,
            'name' => $m->name,
            'url' => $m->url,
            'active' => (bool) $m->active,
        ])->toArray();
    }

    public function save()
    {
        foreach ($this->modules as $module) {
            DeveloproModule::where('id', $module['id'])->update([
                'name'   => $module['name'],
                'url'    => $module['url'],
                'active' => $module['active'] ? 1 : 0,
            ]);
        }

        $this->modules = DeveloproModule::orderBy('id')->get()->toArray();
        $this->dispatch('notify', message: 'Zapisano zmiany!');
    }

    public function render()
    {
        return view('livewire.developro-modules-list');
    }
}
