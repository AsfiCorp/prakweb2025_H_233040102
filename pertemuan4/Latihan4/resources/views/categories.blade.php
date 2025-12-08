<x-layout>
    <x-slot:title>
        Categories
    </x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Daftar Semua Kategori</h1>

    <ul class="list-disc ml-6">
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</x-layout>
