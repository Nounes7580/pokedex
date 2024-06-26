<div class="flex justify-center py-8">
    <div class="bg-base-100 p-6 rounded-lg shadow-lg w-full max-w-3xl">
        <form wire:submit.prevent="createAttack" class="space-y-4">
            <div class="form-control">
                <label for="name" class="label">
                    <span class="label-text">Nom de l'attaque</span>
                </label>
                <input type="text" wire:model="name" id="name" placeholder="Nom de l'attaque" class="input input-bordered w-full">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label for="damage" class="label">
                    <span class="label-text">Dommages</span>
                </label>
                <input type="number" wire:model="damage" id="damage" placeholder="Dommages" class="input input-bordered w-full">
                @error('damage') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label for="description" class="label">
                    <span class="label-text">Description</span>
                </label>
                <textarea wire:model="description" id="description" placeholder="Description" class="textarea textarea-bordered w-full"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Type</span>
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
                            <span class="ml-2">{{ $type->name }}</span>
                        </div>
                    @endforeach
                </div>
                @error('type_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-full">Créer l'attaque</button>
        </form>
    </div>
</div>
