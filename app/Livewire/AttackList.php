<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attack;
use Livewire\Attributes\Layout;
#[Layout('layouts.guest')]
class AttackList extends Component
{
    public $attacks;

    public function mount()
    {
        $this->attacks = Attack::all();
    }

    public function editAttack($id)
    {
        return redirect()->route('attacks.edit', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.attack-list');
    }
}