<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class TypeCreate extends Component
{
    use WithFileUploads;

    public $name, $color, $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:7',
        'image' => 'nullable|image|max:1024', // Valider le fichier image (max 1MB)
    ];

    public function createType()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('types', 'public') : null;

        Type::create([
            'name' => $this->name,
            'color' => $this->color,
            'image' => $imagePath,
        ]);

        $this->dispatch('typeAdded');
        $this->resetFields();
        $this->dispatch('closeModals');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->color = '';
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.type-create');
    }
}
