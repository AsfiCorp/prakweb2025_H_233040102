<x-dashboard-layout>
    <x-slot:title>Post Categories</x-slot:title>

    <div class="mx-auto max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Post Categories</h1>
            <a href="{{ route('categories.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">+ Create Category</a>
        </div>

        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-300">{{ session('success') }}</div>
        @endif

        <div class="relative overflow-x-auto bg-neutral-primary-soft border border-default rounded-base shadow-sm">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-default">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Slug</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="bg-white border-b border-default hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->slug }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="p-2 text-yellow-600 bg-yellow-100 rounded hover:bg-yellow-200">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="p-2 text-red-600 bg-red-100 rounded hover:bg-red-200" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>