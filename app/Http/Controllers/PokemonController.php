<?php
namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with(['type1', 'type2', 'attacks'])->get();
        return view('pokemons.index', compact('pokemons'));
    }

    public function show($id)
    {
        $pokemon = Pokemon::with(['type1', 'type2', 'attacks'])->findOrFail($id);
        return view('pokemons.show', compact('pokemon'));
    }
}
