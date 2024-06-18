<!-- resources/views/livewire/edit-attack.blade.php -->
<div style="background-image: url('{{ asset('images/attack.png') }}'); background-size: cover; background-position: center; min-height: 100vh; width: 100%;">
    <div style="backdrop-filter: blur(15px); min-height: 100vh; width: 100%;">
        <div class="flex justify-center py-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-3xl">
                <form wire:submit.prevent="updateAttack" class="space-y-4">
                    <div class="form-control">
                        <label for="name" class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Nom de l'attaque</span>
                        </label>
                        <input type="text" wire:model="name" id="name" placeholder="Nom de l'attaque" class="input input-bordered w-full">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control">
                        <label for="damage" class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Dommages</span>
                        </label>
                        <input type="number" wire:model="damage" id="damage" placeholder="Dommages" class="input input-bordered w-full">
                        @error('damage') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control">
                        <label for="description" class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Description</span>
                        </label>
                        <textarea wire:model="description" id="description" placeholder="Description" class="textarea textarea-bordered w-full"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Type</span>
                        </label>
                        <div class="flex flex-wrap gap-4">
                            @foreach($types as $type)
                                <div wire:click="$set('type_id', {{ $type->id }})" class="flex items-center p-2 border rounded-lg cursor-pointer
                                    {{ $type_id == $type->id ? 'border-blue-500' : 'border-gray-300 opacity-50 hover:opacity-100' }}"
                                    style="background-color: {{ $type->color }};">
                                    @if ($type->image)
                                        @if (file_exists(public_path('storage/' . $type->image)))
                                            <img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->name }}" class="h-6 w-6 rounded-full">
                                        @else
                                            <img src="{{ asset('images/types/' . $type->image) }}" alt="{{ $type->name }}" class="h-6 w-6 rounded-full">
                                        @endif
                                    @endif
                                    <span class="ml-2 text-gray-800 dark:text-gray-200">{{ $type->name }}</span>
                                </div>
                            @endforeach
                        </div>
                        @error('type_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Mettre à jour l'attaque</button>
                        <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 w-full text-center ml-4">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
