<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class TypeList extends Component
{
    public $types;

    public function mount()
    {
        $this->types = Type::all();
    }

    public function delete($id)
    {
        $type = Type::find($id);

        if ($type) {
            $type->delete();
            $this->types = Type::all();
        }
    }

    public function render()
    {
        return view('livewire.type-list');
    }
}
