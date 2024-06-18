<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class PokemonShow extends Component
{
    public $pokemon;

    public function mount($id)
    {
        $this->pokemon = Pokemon::with('type1', 'type2', 'attacks')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pokemon-show');
    }
}
