<x-app-layout>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Boutons pour ajouter un nouveau Pokémon, afficher la liste des attaques et afficher la liste des types -->
                <div class="flex justify-between mb-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('pokemons.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            {{ __('Add New Pokémon') }}
                        </a>
                        <a href="{{ route('attacks.list') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            {{ __('List of Attacks') }}
                        </a>
                        <a href="{{ route('types.list') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            {{ __('List of Types') }}
                        </a>
                    </div>
                </div>

                <!-- Liste des Pokémon existants -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6">
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        {{ __('Existing Pokémon') }}
                    </h3>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($pokemons as $pokemon)
                            <li class="py-4 flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-10 h-10 rounded-full mr-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $pokemon->name }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('HP:') }} {{ $pokemon->hp }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                                        {{ __('Edit') }}
                                    </a>
                                    <button wire:click="delete({{ $pokemon->id }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
