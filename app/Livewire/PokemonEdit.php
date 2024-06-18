<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class PokemonEdit extends Component
{
    use WithFileUploads;

    public $pokemon;
    public $name = '';
    public $hp = '';
    public $weight = '';
    public $height = '';
    public $type1_id = '';
    public $type2_id = '';
    public $newImage;
    public $image;
    public $types;
    public $attack1_id = '';
    public $attack2_id = '';
    public $attacks;
    public $showCreateAttackModal = false;
    public $showCreateTypeModal = false;

    protected $listeners = ['attackAdded' => 'refreshAttacks', 'typeAdded' => 'refreshTypes', 'closeModals'];

    public function mount(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
        $this->name = $pokemon->name;
        $this->hp = $pokemon->hp;
        $this->weight = $pokemon->weight;
        $this->height = $pokemon->height;
        $this->type1_id = $pokemon->type1_id;
        $this->type2_id = $pokemon->type2_id;
        $this->image = $pokemon->image;
        $this->types = Type::all();
        $this->attacks = Attack::all();
        $this->attack1_id = $pokemon->attacks->count() > 0 ? $pokemon->attacks[0]->id : '';
        $this->attack2_id = $pokemon->attacks->count() > 1 ? $pokemon->attacks[1]->id : '';
    }
    public function updatedPhoto()
    {
        $this->validate(['photo' => 'image|max:1024']);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hp' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'type1_id' => 'required|exists:types,id',
            'type2_id' => 'nullable|exists:types,id',
            'attack1_id' => 'nullable|exists:attacks,id',
            'attack2_id' => 'nullable|exists:attacks,id',
            'newImage' => 'nullable|image|max:1024', // Validation for the new image
        ]);

        if ($this->newImage) {
            $this->image = $this->newImage->store('storage', 'public');
        }

        $this->pokemon->update([
            'name' => $this->name,
            'hp' => $this->hp,
            'weight' => $this->weight,
            'height' => $this->height,
            'type1_id' => $this->type1_id,
            'type2_id' => $this->type2_id,
            'image' => $this->image,
        ]);

        $attacks = [];
        if ($this->attack1_id) {
            $attacks[] = $this->attack1_id;
        }
        if ($this->attack2_id) {
            $attacks[] = $this->attack2_id;
        }
        $this->pokemon->attacks()->sync($attacks);

        session()->flash('success', 'Pokémon updated successfully.');

        return redirect()->route('dashboard');
    }

    public function refreshAttacks()
    {
        $this->attacks = Attack::all();
    }

    public function refreshTypes()
    {
        $this->types = Type::all();
    }

    public function openCreateAttackModal()
    {
        $this->showCreateAttackModal = true;
    }

    public function openCreateTypeModal()
    {
        $this->showCreateTypeModal = true;
    }

    public function closeModals()
    {
        $this->showCreateAttackModal = false;
        $this->showCreateTypeModal = false;
    }

    public function render()
    {
        return view('livewire.pokemon-edit');
    }
}
