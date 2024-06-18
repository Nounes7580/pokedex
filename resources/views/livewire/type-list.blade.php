<!-- resources/views/livewire/type-list.blade.php -->
<div style="background-image: url('{{ asset('images/typebck.png') }}'); background-size: cover; background-position: center; min-height: 100vh; width: 100%;">
    <div style="backdrop-filter: blur(15px); min-height: 100vh; width: 100%;">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('List of Types') }}
                        </h3>
                        <button onclick="history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            {{ __('Back') }}
                        </button>
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($types as $type)
                            <li class="py-4 flex justify-between items-center">
                                <div class="flex items-center">
                                    @if ($type->image)
                                        @if (file_exists(public_path('storage/' . $type->image)))
                                            <img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->name }}" class="h-10 w-10 rounded-full mr-4">
                                        @else
                                            <img src="{{ asset('images/types/' . $type->image) }}" alt="{{ $type->name }}" class="h-10 w-10 rounded-full mr-4">
                                        @endif
                                    @endif
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $type->name }}</h4>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('types.edit', $type->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9m-9-9v9m0-9H3m0 0l9-9 9 9"></path></svg>
                                        {{ __('Edit') }}
                                    </a>
                                    <button wire:click="delete({{ $type->id }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
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
</div>
