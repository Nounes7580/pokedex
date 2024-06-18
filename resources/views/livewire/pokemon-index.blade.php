<div style="background-image: url('{{ asset('images/pokedex.png') }}'); background-size: cover; background-position: center; min-height: 100vh; width: 100%;">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-bold text-center mb-8" style="color: #4A4A4A;">POKEDEX</h1>
        <div class="sticky top-0 z-10 bg-white shadow-lg border-b border-gray-200 backdrop-filter backdrop-blur-lg bg-opacity-90 py-4">
            <div class="flex flex-col md:flex-row justify-center mb-8 space-y-4 md:space-y-0 md:space-x-4 px-4">
                <input wire:model.live="search" type="search" placeholder="Rechercher un Pokémon..." class="w-full md:w-1/2 p-4 rounded-lg shadow-md text-lg border-2 border-gray-300 focus:border-blue-500 focus:outline-none">
                <select wire:model.live="selectedType" class="w-full md:w-1/4 p-4 rounded-lg shadow-md text-lg bg-white border-2 border-gray-300 focus:border-blue-500 focus:outline-none">
                    <option value="">Tous les Types</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
            @foreach ($pokemons as $pokemon)
                <a href="{{ route('pokemon.show', $pokemon->id) }}" class="block bg-white rounded-lg border-2 shadow-lg hover:shadow-xl hover:scale-105 transform transition duration-300 overflow-hidden" style="border-color: {{ $pokemon->type1->color }}">
                    <div class="p-4">
                        <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-32 h-32 mx-auto mt-4">
                        <div class="p-4 text-center">
                            <h2 class="text-xl font-bold mb-2">{{ $pokemon->name }}</h2>
                            <div class="text-gray-700">
                                <p class="text-sm">Points de vie : <span class="font-semibold">{{ $pokemon->hp }}</span></p>
                                <p class="text-sm">Poids : <span class="font-semibold">{{ $pokemon->weight }} kg</span></p>
                                <p class="text-sm">Taille : <span class="font-semibold">{{ $pokemon->height }} m</span></p>
                                @if ($pokemon->type1)
                                    <p class="text-sm">Type 1 : <span class="font-semibold" style="color: {{ $pokemon->type1->color }}">{{ $pokemon->type1->name }}</span></p>
                                @endif
                                @if ($pokemon->type2)
                                    <p class="text-sm">Type 2 : <span class="font-semibold" style="color: {{ $pokemon->type2->color }}">{{ $pokemon->type2->name }}</span></p>
                                @endif
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-bold mb-2">Attaques :</h3>
                                <div class="flex flex-wrap justify-center">
                                    @foreach ($pokemon->attacks as $attack)
                                        <span class="inline-block bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded mr-2 mb-2">{{ $attack->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
