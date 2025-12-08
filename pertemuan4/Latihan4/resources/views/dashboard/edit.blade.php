<x-dashboard-layout>
    <x-slot:title>Edit Post - Dashboard</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Post</h1>
        </div>

        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5 mb-4 md:mb-6">
                <h3 class="text-lg font-medium text-heading">Edit Information</h3>
            </div>

            {{-- Form Wrapper dengan Method PUT --}}
            <form action="{{ route('dashboard.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                {{-- Mengirim data $post ke component --}}
                <x-posts.form :categories="$categories" :post="$post" />

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('dashboard.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>