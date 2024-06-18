<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PokemonIndex;
use App\Livewire\PokemonShow;
use App\Livewire\Dashboard;
use App\Livewire\PokemonEdit;
use App\Livewire\PokemonCreate;
use App\Livewire\AttackList;
use App\Livewire\EditAttack;
use App\Livewire\TypeList;
use App\Livewire\TypeEdit;
Route::view('/', 'welcome');

Route::get('/pokemons', PokemonIndex::class)->name('pokemons.index');
Route::get('/pokemon/{id}', PokemonShow::class)->name('pokemon.show');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/pokemons/create', PokemonCreate::class)->name('pokemons.create');
    Route::get('/pokemons/{pokemon}/edit', PokemonEdit::class)->name('pokemons.edit');
    Route::get('/attacks', AttackList::class)->name('attacks.list');
    Route::get('/attacks/{id}/edit', EditAttack::class)->name('attacks.edit');
    Route::get('/types', TypeList::class)->name('types.list');
    Route::get('/types/{type}/edit', TypeEdit::class)->name('types.edit');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
