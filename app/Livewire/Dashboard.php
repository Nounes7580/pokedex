<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Layout;
#[Layout('layouts.guest')]
class Dashboard extends Component
{
    public $pokemons;
    public $types;

    public function mount()
    {
        $this->types = Type::all();
        $this->pokemons = Pokemon::all();
    }

    public function delete($id)
    {
        $pokemon = Pokemon::find($id);
        if ($pokemon) {
            $pokemon->delete();
            session()->flash('success', 'Pokémon deleted successfully.');
            $this->pokemons = Pokemon::all(); // Refresh the list
        } else {
            session()->flash('error', 'Pokémon not found.');
        }
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('dashboard');
    }
}
