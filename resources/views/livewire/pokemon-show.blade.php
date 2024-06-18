<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-cover bg-center flex justify-center items-center" style="background-image: url('{{ asset('images/paysage.png') }}');">
        <div class="bg-white bg-opacity-80 rounded-lg shadow-lg p-8 max-w-md w-full">
            <div class="flex flex-col items-center mb-4">
                <img src="{{ asset('storage/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-32 h-32 object-cover rounded-full border-2 border-gray-200">
                <div class="mt-4 text-center">
                    <h2 class="text-3xl font-bold">{{ $pokemon->name }}</h2>
                    <p class="font-semibold">Points de vie : <span class="font-semibold">{{ $pokemon->hp }}</span></p>
                    <p class="font-semibold">Poids : <span class="font-semibold">{{ $pokemon->weight }} kg</span></p>
                    <p class="font-semibold">Taille : <span class="font-semibold">{{ $pokemon->height }} m</span></p>
                    <div class="mt-2">
                        <p class="font-semibold"></p>
                        <div class="flex items-center justify-center p-2 border rounded-lg" style="background-color: {{ $pokemon->type1->color }};">
                            @if ($pokemon->type1->image)
                                @if (file_exists(public_path('storage/' . $pokemon->type1->image)))
                                    <img src="{{ asset('storage/' . $pokemon->type1->image) }}" alt="{{ $pokemon->type1->name }}" class="h-6 w-6 rounded-full">
                                @else
                                    <img src="{{ asset('images/types/' . $pokemon->type1->image) }}" alt="{{ $pokemon->type1->name }}" class="h-6 w-6 rounded-full">
                                @endif
                            @endif
                            <span class="ml-2 text-sm text-white">{{ $pokemon->type1->name }}</span>
                        </div>
                    </div>
                    @if ($pokemon->type2)
                        <div class="mt-2">
                            <p class="font-semibold"></p>
                            <div class="flex items-center justify-center p-2 border rounded-lg" style="background-color: {{ $pokemon->type2->color }};">
                                @if ($pokemon->type2->image)
                                    @if (file_exists(public_path('storage/' . $pokemon->type2->image)))
                                        <img src="{{ asset('storage/' . $pokemon->type2->image) }}" alt="{{ $pokemon->type2->name }}" class="h-6 w-6 rounded-full">
                                    @else
                                        <img src="{{ asset('images/types/' . $pokemon->type2->image) }}" alt="{{ $pokemon->type2->name }}" class="h-6 w-6 rounded-full">
                                    @endif
                                @endif
                                <span class="ml-2 text-sm text-white">{{ $pokemon->type2->name }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-8">
                <h3 class="text-2xl font-bold mb-4">Attaques</h3>
                <div class="space-y-4">
                    @foreach ($pokemon->attacks as $attack)
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                            <p class="font-semibold text-lg">{{ $attack->name }}</p>
                            <p class="text-gray-600">{{ $attack->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-8">
                <a href="{{ route('pokemons.index') }}" class="inline-block bg-gray-500 text-white text-xs px-4 py-2 rounded hover:bg-gray-700">Retour à la liste</a>
            </div>
        </div>
    </div>
</body>
</html>
