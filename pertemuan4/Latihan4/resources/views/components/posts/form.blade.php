@props(['categories', 'post' => null])

<div class="space-y-6">
    {{-- Title --}}
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
               value="{{ old('title', $post->title ?? '') }}" required>
    </div>

    {{-- Category --}}
    <div>
        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Excerpt --}}
    <div>
        <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">Excerpt</label>
        <textarea id="excerpt" name="excerpt" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    {{-- Body --}}
    <div>
        <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Body</label>
        <textarea id="body" name="body" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{ old('body', $post->body ?? '') }}</textarea>
    </div>

    {{-- Image --}}
     <div>
        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Upload Image</label>
        @if(isset($post) && $post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="mb-3 w-32 h-auto rounded">
        @endif
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="image" name="image" type="file">
    </div>
</div>