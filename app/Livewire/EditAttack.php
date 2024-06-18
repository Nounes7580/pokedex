<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Attack;
use App\Models\Type;
use Livewire\Attributes\Layout;


#[Layout('layouts.guest')]
class EditAttack extends Component
{
    public $attackId;
    public $name;
    public $damage;
    public $description;
    public $type_id;
    public $types;

    public function mount($id)
    {
        $attack = Attack::find($id);

        if ($attack) {
            $this->attackId = $attack->id;
            $this->name = $attack->name;
            $this->damage = $attack->damage;
            $this->description = $attack->description;
            $this->type_id = $attack->type_id;
        }

        $this->types = Type::all();
    }

    public function updateAttack()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack = Attack::find($this->attackId);
        if ($attack) {
            $attack->update([
                'name' => $this->name,
                'damage' => $this->damage,
                'description' => $this->description,
                'type_id' => $this->type_id,
            ]);

            session()->flash('success', 'Attack updated successfully.');

            return redirect()->route('attacks.list');
        } else {
            session()->flash('error', 'Attack not found.');
        }
    }

    public function render()
    {
        return view('livewire.edit-attack');
    }
}