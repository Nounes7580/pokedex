<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PokemonTest extends DuskTestCase
{
    /**
     * Test creating a new Pokémon.
     *
     * @return void
     */
    public function testCreatePokemon()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pokemons/create')
                    ->type('name', 'Pikachu')
                    ->type('hp', '35')
                    ->type('weight', '6')
                    ->type('height', '0.4')
                    ->select('type1_id', '1') // Assuming 1 is the ID of a valid type
                    ->attach('image', __DIR__.'/images/pikachu.png') // Path to your test image
                    ->press('Save')
                    ->assertPathIs('/pokemons')
                    ->assertSee('Pikachu');
        });
    }

    /**
     * Test editing an existing Pokémon.
     *
     * @return void
     */
    public function testEditPokemon()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pokemons/1/edit') // Assuming 1 is the ID of an existing Pokémon
                    ->type('name', 'Raichu')
                    ->type('hp', '60')
                    ->press('Update')
                    ->assertPathIs('/pokemons')
                    ->assertSee('Raichu');
        });
    }
}
