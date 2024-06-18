<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attack;

class AttackSeeder extends Seeder
{
    public function run()
    {
        $attacks = [
            ['name' => 'Hydro Pump', 'type_id' => 2, 'damage' => 110], // type Eau
            ['name' => 'Thunder Shock', 'type_id' => 1, 'damage' => 40], // type Electrique
            ['name' => 'Fairy Wind', 'type_id' => 3, 'damage' => 40], // type Fée
            ['name' => 'Flamethrower', 'type_id' => 4, 'damage' => 90], // type Feu
            ['name' => 'Ice Beam', 'type_id' => 5, 'damage' => 90], // type Glace
            ['name' => 'Rock Slide', 'type_id' => 6, 'damage' => 75], // type Pierre
            ['name' => 'Leaf Blade', 'type_id' => 7, 'damage' => 90], // type Plante
            ['name' => 'Psybeam', 'type_id' => 8, 'damage' => 65], // type Psy
            ['name' => 'Metal Claw', 'type_id' => 9, 'damage' => 50], // type Robot
            ['name' => 'Earthquake', 'type_id' => 10, 'damage' => 100], // type Sol
            ['name' => 'Dark Pulse', 'type_id' => 11, 'damage' => 80], // type Ténèbre
        ];

        foreach ($attacks as $attack) {
            Attack::updateOrCreate(['name' => $attack['name']], $attack);
        }
    }
}
