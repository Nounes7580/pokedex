<div style="background-image: url('{{ asset('images/center.png') }}'); background-size: cover; background-position: center; min-height: 100vh; width: 100%;">
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pokémon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: rgba(255, 255, 255, 0.75); backdrop-filter: blur(10px);" class="overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form wire:submit.prevent="update">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input id="name" type="text" wire:model="name" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="hp" class="block font-medium text-sm text-gray-700">HP</label>
                            <input id="hp" type="number" wire:model="hp" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="weight" class="block font-medium text-sm text-gray-700">Weight</label>
                            <input id="weight" type="number" step="0.1" wire:model="weight" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="height" class="block font-medium text-sm text-gray-700">Height</label>
                            <input id="height" type="number" step="0.1" wire:model="height" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="type1_id" class="block font-medium text-sm text-gray-700">Type 1</label>
                            <select id="type1_id" wire:model="type1_id" class="mt-1 block w-full" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="mt-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700" wire:click="openCreateTypeModal">
                                {{ __('Add New Type') }}
                            </button>
                        </div>
                        <div>
                            <label for="type2_id" class="block font-medium text-sm text-gray-700">Type 2</label>
                            <select id="type2_id" wire:model="type2_id" class="mt-1 block w-full">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="attack1_id" class="block font-medium text-sm text-gray-700">Attack 1</label>
                            <select id="attack1_id" wire:model="attack1_id" class="mt-1 block w-full">
                                <option value="">None</option>
                                @foreach($attacks as $attack)
                                    <option value="{{ $attack->id }}">{{ $attack->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="mt-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700" wire:click="openCreateAttackModal">
                                {{ __('Add New Attack') }}
                            </button>
                        </div>
                        <div>
                            <label for="attack2_id" class="block font-medium text-sm text-gray-700">Attack 2</label>
                            <select id="attack2_id" wire:model="attack2_id" class="mt-1 block w-full">
                                <option value="">None</option>
                                @foreach($attacks as $attack)
                                    <option value="{{ $attack->id }}">{{ $attack->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                        <label for="newImage" class="block font-medium text-sm text-gray-700">New Image</label>
                            <input id="newImage" type="file" wire:model="newImage" class="mt-1 block w-full">
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" alt="New Image Preview" class="mt-2 w-20 h-20 object-cover">
                            @elseif ($image)
                                <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="mt-2 w-20 h-20 object-cover">
                            @endif
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            {{ __('Update Pokémon') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for creating attack -->
    <div class="@if(!$showCreateAttackModal) hidden @endif fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Créer une attaque</h3>
                <button type="button" wire:click="$dispatch('closeModals')" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            @livewire('attack-create')
        </div>
    </div>

    <!-- Modal for creating type -->
    <div class="@if(!$showCreateTypeModal) hidden @endif fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Créer un type</h3>
                <button type="button" wire:click="$dispatch('closeModals')" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            @livewire('type-create')
        </div>
    </div>
</div>
