<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Investment;
use App\Models\InvestmentStage;
use App\Models\Gallery;

class InvestmentStages extends Component
{
    public Investment $investment;

    public $stageId = null;
    public $name;
    public $date;
    public $percent;
    public $content;
    public $position;
    public $showStageModal = false;

    protected $rules = [
        'name' => 'required|string|max:190',
        'date' => 'required|string|max:190',
        'percent' => 'required|numeric|min:0|max:100',
        'content' => '',
        'position' => 'nullable|integer',
    ];

    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['stageId','name','date','percent','content','position']);

        // szczególnie ważne dla TinyMCE
        $this->content = '';

        $this->showStageModal = true;
        $this->dispatch('openStageModal');
    }

    public function editStage($id)
    {
        $stage = InvestmentStage::findOrFail($id);

        $this->stageId = $stage->id;
        $this->name = $stage->name;
        $this->date = $stage->date;
        $this->percent = $stage->percent;
        $this->content = $stage->content;
        $this->position = $stage->position;

        $this->showStageModal = true;
        $this->dispatch('openStageModal');
    }

    public function save()
    {
        $this->validate();

        if (!$this->position) {
            $maxPosition = $this->investment->stages()->max('position') ?? 0;
            $this->position = $maxPosition + 1;
        }

        $data = [
            'investment_id' => $this->investment->id,
            'name' => $this->name,
            'date' => $this->date,
            'percent' => $this->percent,
            'content' => $this->content,
            'position' => $this->position,
        ];

        if ($this->stageId) {
            InvestmentStage::where('id', $this->stageId)->update($data);
        } else {
            InvestmentStage::create($data);
        }

        $this->reset(['stageId','name','date','percent','content','position']);
        $this->showStageModal = false;
        $this->dispatch('stageSaved');
    }

    public function delete($id)
    {
        InvestmentStage::findOrFail($id)->delete();
        $this->dispatch('stageDeleted');
    }

    public function render()
    {
        return view('livewire.investment-stages', [
            'stages' => $this->investment->stages()->orderBy('position')->get(),
            'galleries' => Gallery::all(),
        ]);
    }
}
