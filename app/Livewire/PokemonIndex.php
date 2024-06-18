<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type; 
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class PokemonIndex extends Component
{
    #[Url(as: 'q')]
    public $search = '';

    #[Url(as: 'type')] // Ajoutez cette ligne pour gérer le type via l'URL
    public $selectedType = '';

    public function render()
    {
        $types = Type::all(); // Récupérer tous les types

        $pokemons = Pokemon::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedType, function ($query) {
                $query->where(function ($q) {
                    $q->where('type1_id', $this->selectedType)
                      ->orWhere('type2_id', $this->selectedType);
                });
            })
            ->get();    

        return view('livewire.pokemon-index', [
            'pokemons' => $pokemons,
            'types' => $types,
        ]);
    }
    
}
