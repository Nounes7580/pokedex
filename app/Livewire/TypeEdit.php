<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class TypeEdit extends Component
{
    use WithFileUploads;

    public $typeId, $name, $color, $image, $newImage;

    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:7',
        'newImage' => 'nullable|image|max:1024', // Validation de la nouvelle image (max 1MB)
    ];

    public function mount(Type $type)
    {
        $this->typeId = $type->id;
        $this->name = $type->name;
        $this->color = $type->color;
        $this->image = $type->image;
    }

    public function updateType()
    {
        $this->validate();

        if ($this->newImage) {
            $imagePath = $this->newImage->store('types', 'public');
        } else {
            $imagePath = $this->image;
        }

        $type = Type::find($this->typeId);
        $type->update([
            'name' => $this->name,
            'color' => $this->color,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Type updated successfully.');
        return redirect()->route('types.list');
    }

    public function render()
    {
        return view('livewire.type-edit');
    }
}
