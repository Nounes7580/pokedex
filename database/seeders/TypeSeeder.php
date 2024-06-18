<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['id' => 1, 'name' => 'Electrique', 'color' => '#F8D030', 'image' => 'electrique.png'],
            ['id' => 2, 'name' => 'Eau', 'color' => '#6890F0', 'image' => 'eau.png'],
            ['id' => 3, 'name' => 'Fée', 'color' => '#EE99AC', 'image' => 'fee.png'],
            ['id' => 4, 'name' => 'Feu', 'color' => '#F08030', 'image' => 'feu.png'],
            ['id' => 5, 'name' => 'Glace', 'color' => '#98D8D8', 'image' => 'glace.png'],
            ['id' => 6, 'name' => 'Pierre', 'color' => '#B8A038', 'image' => 'pierre.png'],
            ['id' => 7, 'name' => 'Plante', 'color' => '#78C850', 'image' => 'plante.png'],
            ['id' => 8, 'name' => 'Psy', 'color' => '#F85888', 'image' => 'psy.png'],
            ['id' => 9, 'name' => 'Robot', 'color' => '#A8A8A8', 'image' => 'robot.png'],
            ['id' => 10, 'name' => 'Sol', 'color' => '#E0C068', 'image' => 'sol.png'],
            ['id' => 11, 'name' => 'Ténèbre', 'color' => '#7B68EE', 'image' => 'tenebre.png'], // Couleur mauve
        ];

        foreach ($types as $type) {
            Type::updateOrCreate(['id' => $type['id']], $type);
        }
    }
}
