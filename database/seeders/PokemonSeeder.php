<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\Attack;

class PokemonSeeder extends Seeder
{
    public function run()
    {
        $pokemons = [
            [
                'name' => 'EauPokemon',
                'hp' => 45,
                'weight' => 8.5,
                'height' => 0.6,
                'type1_id' => 2, // ID du type Eau
                'type2_id' => null,
                'image' => 'images/eau.png', // Chemin correct
                'attacks' => ['Hydro Pump']
            ],
            [
                'name' => 'ElectriquePokemon',
                'hp' => 40,
                'weight' => 6.0,
                'height' => 0.4,
                'type1_id' => 1, // ID du type Electrique
                'type2_id' => null,
                'image' => 'images/electrique.png', // Chemin correct
                'attacks' => ['Thunder Shock']
            ],
            [
                'name' => 'FeePokemon',
                'hp' => 35,
                'weight' => 5.0,
                'height' => 0.3,
                'type1_id' => 3, // ID du type Fée
                'type2_id' => null,
                'image' => 'images/fee.png', // Chemin correct
                'attacks' => ['Fairy Wind']
            ],
            [
                'name' => 'FeuPokemon',
                'hp' => 39,
                'weight' => 7.5,
                'height' => 0.5,
                'type1_id' => 4, // ID du type Feu
                'type2_id' => null,
                'image' => 'images/feu.png', // Chemin correct
                'attacks' => ['Flamethrower']
            ],
            [
                'name' => 'GlacePokemon',
                'hp' => 55,
                'weight' => 9.0,
                'height' => 0.8,
                'type1_id' => 5, // ID du type Glace
                'type2_id' => null,
                'image' => 'images/glace.png', // Chemin correct
                'attacks' => ['Ice Beam']
            ],
            [
                'name' => 'PierrePokemon',
                'hp' => 50,
                'weight' => 10.0,
                'height' => 0.7,
                'type1_id' => 6, // ID du type Pierre
                'type2_id' => null,
                'image' => 'images/pierre.png', // Chemin correct
                'attacks' => ['Rock Slide']
            ],
            [
                'name' => 'PlantePokemon',
                'hp' => 45,
                'weight' => 6.5,
                'height' => 0.4,
                'type1_id' => 7, // ID du type Plante
                'type2_id' => null,
                'image' => 'images/plante.png', // Chemin correct
                'attacks' => ['Leaf Blade']
            ],
            [
                'name' => 'PsyPokemon',
                'hp' => 60,
                'weight' => 8.0,
                'height' => 0.6,
                'type1_id' => 8, // ID du type Psy
                'type2_id' => null,
                'image' => 'images/psy.png', // Chemin correct
                'attacks' => ['Psybeam']
            ],
            [
                'name' => 'RobotPokemon',
                'hp' => 70,
                'weight' => 15.0,
                'height' => 1.2,
                'type1_id' => 9, // ID du type Robot
                'type2_id' => null,
                'image' => 'images/robot.png', // Chemin correct
                'attacks' => ['Metal Claw']
            ],
            [
                'name' => 'SolPokemon',
                'hp' => 50,
                'weight' => 12.0,
                'height' => 0.9,
                'type1_id' => 10, // ID du type Sol
                'type2_id' => null,
                'image' => 'images/sol.png', // Chemin correct
                'attacks' => ['Earthquake']
            ],
            [
                'name' => 'TenebrePokemon',
                'hp' => 55,
                'weight' => 11.0,
                'height' => 0.8,
                'type1_id' => 11, // ID du type Ténèbre
                'type2_id' => null,
                'image' => 'images/tenebre.png', // Chemin correct
                'attacks' => ['Dark Pulse']
            ],
        ];

        foreach ($pokemons as $pokemonData) {
            $attacks = $pokemonData['attacks'];
            unset($pokemonData['attacks']);
            $pokemon = Pokemon::updateOrCreate(
                ['name' => $pokemonData['name']],
                $pokemonData
            );

            // Associer les attaques au Pokémon
            $attackIds = Attack::whereIn('name', $attacks)->pluck('id');
            $pokemon->attacks()->sync($attackIds);
        }
    }
}
