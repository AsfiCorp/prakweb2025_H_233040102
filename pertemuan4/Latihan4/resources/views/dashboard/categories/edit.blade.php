<x-dashboard-layout>
    <x-slot:title>
        Edit Category - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Category</h1>
        </div>

        {{-- Form Card --}}
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-6">
            <form method="post" action="{{ route('categories.update', $category->id) }}">
                @method('put') {{-- Wajib ada untuk Update --}}
                @csrf
                
                {{-- Input Name --}}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                    <input type="text" id="name" name="name" 
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror" 
                           value="{{ old('name', $category->name) }}" required>
                    
                    {{-- Error Message --}}
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Tombol Action --}}
                <div class="flex justify-end gap-3">
                    <a href="{{ route('categories.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>