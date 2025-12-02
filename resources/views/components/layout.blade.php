<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Menggunakan Tailwind CSS via CDN untuk kemudahan praktek --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title }}</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        {{-- Navbar --}}
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                {{-- Link Navigasi --}}
                                <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Home</a>

                                <a href="/blog" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
                                
                                <a href="/categories" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Categories</a>
                                
                                <a href="/about" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                                
                                <a href="/contact" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Header (Optional, agar lebih rapi) --}}
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
            </div>
        </header>

        {{-- Main Content (Slot) --}}
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        {{-- Footer (Tugas Latihan) --}}
        <footer class="bg-gray-800 text-white text-center py-4 mt-10">
            <p>&copy; 2025 Teknik Informatika UNPAS. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>