<x-dashboard-layout>
    <x-slot:title>My Posts - Dashboard</x-slot:title>

    <div class="mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">My Posts</h1>
            <a href="{{ route('dashboard.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">+ Create New Post</a>
        </div>

        @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-300">
            <span class="font-medium me-1">Success!</span> {{ session('success') }}
        </div>
        @endif

        <div class="relative overflow-x-auto bg-neutral-primary-soft border border-default rounded-base shadow-sm">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-default">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr class="bg-white border-b border-default hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $post->title }}</td>
                        <td class="px-6 py-4">{{ $post->category->name }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            {{-- VIEW --}}
                            <a href="{{ route('dashboard.show', $post->slug) }}" class="p-2 text-blue-600 bg-blue-100 rounded hover:bg-blue-200">View</a>
                            
                            {{-- EDIT (Tugas 2) --}}
                            <a href="{{ route('dashboard.edit', $post->slug) }}" class="p-2 text-yellow-600 bg-yellow-100 rounded hover:bg-yellow-200">Edit</a>
                            
                            {{-- DELETE (Tugas 3) --}}
                            <form action="{{ route('dashboard.destroy', $post->slug) }}" method="post" class="inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="p-2 text-red-600 bg-red-100 rounded hover:bg-red-200" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-6 py-4 text-center">No posts found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
</x-dashboard-layout>