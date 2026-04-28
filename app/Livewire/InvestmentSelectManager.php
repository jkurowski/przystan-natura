<?php

namespace App\Livewire;

use App\Models\InvestmentSearchforms;
use Livewire\Component;
use App\Models\InvestmentSelectfield;

class InvestmentSelectManager extends Component
{
    public $category = 1;
    public $type;
    public $label;
    public $value;
    public $sort = 0;

    public $fieldsByCategory = [];
    protected $listeners = ['sortItems'];
    public $categoriesActive = [];

    public $editingId = null;

    public function mount()
    {
        $this->loadFields();
        $this->categoriesActive = InvestmentSearchforms::pluck('active', 'id')->toArray();
    }

    public function loadFields()
    {
        $this->fieldsByCategory = [
            1 => InvestmentSelectfield::where('category', 1)->orderBy('sort')->get(),
            2 => InvestmentSelectfield::where('category', 2)->orderBy('sort')->get(),
        ];
    }

    public function saveField()
    {
        $this->validate([
            'category' => 'required|integer',
            'type'     => 'required|integer',
            'label'    => 'required|string|max:255',
            'value'    => 'required|string|max:255',
            'sort'     => 'nullable|integer',
        ]);

        if ($this->editingId) {
            InvestmentSelectfield::find($this->editingId)->update([
                'category' => $this->category,
                'type'     => $this->type,
                'label'    => $this->label,
                'value'    => $this->value,
                'sort'     => $this->sort ?? 0,
            ]);
        } else {
            InvestmentSelectfield::create([
                'category' => $this->category,
                'type'     => $this->type,
                'label'    => $this->label,
                'value'    => $this->value,
                'sort'     => $this->sort ?? 0,
            ]);
        }

        $this->reset(['label','value','sort','type','editingId']);
        $this->loadFields();
    }

    public function edit($id)
    {
        $field = InvestmentSelectfield::findOrFail($id);

        $this->editingId = $id;
        $this->category = $field->category;
        $this->type = $field->type;
        $this->label = $field->label;
        $this->value = $field->value;
        $this->sort = $field->sort;
    }

    public function delete($id)
    {
        InvestmentSelectfield::findOrFail($id)->delete();
        $this->loadFields();
    }

    public function sortItems($category, $orderedIds)
    {
        info('sortItems wywołane: category=' . $category . ', orderedIds=' . implode(',', $orderedIds));


        foreach ($orderedIds as $index => $id) {
            InvestmentSelectfield::where('id', $id)->update(['sort' => $index]);
        }

        $this->loadFields();
    }

    public function render()
    {
        return view('livewire.investment-select-manager');
    }

    public function updatedLabel($value)
    {
        $clean = preg_replace('/[^0-9\-]/', '', $value);
        $clean = preg_replace('/-+/', '-', $clean);
        $this->value = $clean;
    }

    public function toggleCategory($categoryId)
    {
        $form = InvestmentSearchforms::find($categoryId);

        if (!$form) return;

        $form->active = !$form->active;
        $form->save();

        $this->categoriesActive[$categoryId] = $form->active;
    }
}
