<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class PokemonCreate extends Component
{
    use WithFileUploads;

    public $name = '';
    public $hp = '';
    public $weight = '';
    public $height = '';
    public $type1_id = '';
    public $type2_id = '';
    public $image;
    public $types;
    public $attacks;
    public $selectedTypes = [];
    public $selectedAttacks = [];
    public $showCreateAttackModal = false;
    public $showCreateTypeModal = false;

    protected $listeners = ['attackAdded' => 'refreshAttacks', 'typeAdded' => 'refreshTypes', 'closeModals'];

    public function mount()
    {
        $this->types = Type::all();
        $this->attacks = Attack::all();
    }

    public function updatedImage()
    {
        $this->validate(['image' => 'image|max:1024']);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hp' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'selectedTypes' => 'required|array|min:1|max:2',
            'image' => 'required|image|max:1024',
            'selectedAttacks' => 'required|array|min:1',
        ]);

        $imagePath = $this->image->store('images', 'public');

        $pokemon = Pokemon::create([
            'name' => $this->name,
            'hp' => $this->hp,
            'weight' => $this->weight,
            'height' => $this->height,
            'type1_id' => $this->selectedTypes[0] ?? null,
            'type2_id' => $this->selectedTypes[1] ?? null,
            'image' => $imagePath,
        ]);

        if ($this->selectedAttacks) {
            $pokemon->attacks()->attach($this->selectedAttacks);
        }

        session()->flash('success', 'Pokémon ajouté avec succès.');

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
        return view('livewire.pokemon-create');
    }
}
