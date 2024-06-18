<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attack;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class AttackCreate extends Component
{
    public $name, $damage, $description, $type_id;
    public $types;

    protected $listeners = ['openAttackModal'];

    public function mount()
    {
        $this->types = Type::all();
    }

    public function createAttack()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack = Attack::create([
            'name' => $this->name,
            'damage' => $this->damage,
            'description' => $this->description,
            'type_id' => $this->type_id,
        ]);

        $this->dispatch('attackAdded');
        $this->resetFields();
        $this->dispatch('closeModals');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->damage = '';
        $this->description = '';
        $this->type_id = '';
    }

    public function render()
    {
        return view('livewire.attack-create');
    }
}
