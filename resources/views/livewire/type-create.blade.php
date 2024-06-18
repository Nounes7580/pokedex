<div class="flex justify-center py-8">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
        <form wire:submit.prevent="createType" class="space-y-4" enctype="multipart/form-data">
            <div class="form-control">
                <label for="name" class="label">
                    <span class="label-text">Nom du type</span>
                </label>
                <input type="text" wire:model="name" id="name" placeholder="Nom du type" class="input input-bordered w-full">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="form-control">
                <label for="color" class="label">
                    <span class="label-text">Couleur</span>
                </label>
                <input type="color" wire:model="color" id="color" class="input input-bordered w-full">
                @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="form-control">
                <label for="image" class="label">
                    <span class="label-text">Image</span>
                </label>
                <input type="file" wire:model="image" id="image" class="input input-bordered w-full">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary w-full">Créer le type</button>
        </form>
    </div>
</div>
