<!-- resources/views/livewire/type-edit.blade.php -->
<div style="background-image: url('{{ asset('images/typebck.png') }}'); background-size: cover; background-position: center; min-height: 100vh; width: 100%;">
    <div style="backdrop-filter: blur(15px); min-height: 100vh; width: 100%;">
        <div class="flex justify-center py-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-3xl">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-4">
                    {{ __('Edit Type') }}
                </h3>
                <form wire:submit.prevent="updateType" class="space-y-4" enctype="multipart/form-data">
                    <div class="form-control">
                        <label for="name" class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Nom du type</span>
                        </label>
                        <input type="text" wire:model="name" id="name" placeholder="Nom du type" class="input input-bordered w-full">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control">
                        <label for="color" class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Couleur</span>
                        </label>
                        <input type="color" wire:model="color" id="color" class="input input-bordered w-full">
                        @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-control">
                        <label for="image" class="label">
                            <span class="label-text text-gray-800 dark:text-gray-200">Image</span>
                        </label>
                        <input type="file" wire:model="newImage" id="image" class="input input-bordered w-full">
                        @if ($newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" alt="Image Preview" class="mt-2 w-20 h-20 object-cover">
                        @elseif ($image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $name }}" class="mt-2 w-20 h-20 object-cover">
                        @endif
                        @error('newImage') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Mettre à jour le type</button>
                        <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 w-full text-center ml-4">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
