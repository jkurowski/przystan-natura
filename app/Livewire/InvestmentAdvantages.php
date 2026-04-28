<?php

namespace App\Livewire;

use Illuminate\Support\Facades\File;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\Component;

// CMS
use App\Models\Investment;
use App\Models\InvestmentAdvantage;

class InvestmentAdvantages extends Component
{
    use WithFileUploads;

    public Investment $investment;
    public $title, $subtitle, $position, $image_title;
    public ?TemporaryUploadedFile $image = null;
    public ?string $imagePath = null;
    public $showModal = false;
    public $advantageId = null;
    public $investmentId = null;

    protected $rules = [
        'title' => 'required|string|max:190',
        'subtitle' => 'required|string|max:190',
        'image' => 'nullable|file',
        'image_title' => 'required|string|max:190',
        'position' => 'nullable|integer',
    ];

    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['title', 'subtitle', 'image', 'image_title', 'position']);
        $this->advantageId = null;
        $this->investmentId = $this->investment->id;
        $this->showModal = true;
    }

    public function delete($id)
    {
        $advantage = InvestmentAdvantage::findOrFail($id);
        if ($advantage->image) {
            $path = public_path('investment/advantages/' . $advantage->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $advantage->delete();

        $this->dispatch('advantageDeleted');
    }

    public function editAdvantage($id)
    {
        $advantage = InvestmentAdvantage::findOrFail($id);

        $this->advantageId = $advantage->id;
        $this->investmentId = $advantage->investment_id;
        $this->title = $advantage->title;
        $this->subtitle = $advantage->subtitle;
        $this->imagePath = $advantage->image;
        $this->image_title = $advantage->image_title;
        $this->position = $advantage->position;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if (!$this->position) {
            $maxPosition = $this->investment->advantages()->max('position') ?? 0;
            $this->position = $maxPosition + 1;
        }

        $name = null;


        if ($this->image) {
            $name = time().'_'.preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $this->image->getClientOriginalName());

            $destination = public_path('investment/advantages');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            // Usuń stary plik, jeśli istnieje
            if ($this->advantageId) {
                $existing = InvestmentAdvantage::find($this->advantageId);
                if ($existing && $existing->image) {
                    $oldPath = $destination . '/' . $existing->image;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }

            $tempPath = $this->image->getRealPath();
            if (!copy($tempPath, $destination.'/'.$name)) {
                throw new \Exception("Could not move uploaded file.");
            }
        }

        if ($this->advantageId) {
            $data = [
                'investment_id' => $this->investmentId,
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image_title' => $this->image_title,
                'position' => $this->position,
            ];

            if ($name) {
                $data['image'] = $name;
            }

            if ($this->advantageId) {
                InvestmentAdvantage::where('id', $this->advantageId)->update($data);
            } else {
                InvestmentAdvantage::create($data);
            }
        } else {
            InvestmentAdvantage::create([
                'investment_id' => $this->investmentId,
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image' => $name,
                'image_title' => $this->image_title,
                'position' => $this->position,
            ]);
        }

        $this->reset(['advantageId', 'title', 'subtitle', 'image', 'image_title', 'position']);
        $this->showModal = false;
        $this->dispatch('advantageAdded');
    }

    public function render()
    {
        return view('livewire.investment-advantages', [
            'advantages' => $this->investment->advantages()->orderBy('position')->get(),
        ]);
    }
}

