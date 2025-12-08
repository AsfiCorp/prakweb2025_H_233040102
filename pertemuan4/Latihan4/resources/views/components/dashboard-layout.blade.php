<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        {{-- Tambahkan Slot baru dengan nama $title --}}
        <title>{{ $title }}</title>
    
        @vite('resources/css/app.css')
    
        {{-- flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    </head>
<body class="h-full">
    <div class="min-h-full">
        {{-- Navbar --}}
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
        
                    {{-- LEFT SIDE NAV --}}
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Home</a>
                                <a href="/blog" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
                                <a href="/categories" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Categories</a>
                                <a href="/about" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                                <a href="/contact" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
                            </div>
                        </div>
                    </div>
        
                    {{-- RIGHT SIDE: LOGIN / REGISTER OR USER + LOGOUT --}}
                    <div class="flex items-center space-x-4">
        
                        @guest
                            {{-- TOMBOL LOGIN --}}
                            <a href="/login"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Login
                            </a>
        
                            {{-- TOMBOL REGISTER --}}
                            <a href="/register"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">
                                Register
                            </a>
                        @endguest
        
                        @auth
                            {{-- NAMA USER --}}
                            <span class="text-gray-300 px-3 py-2 text-sm font-medium">
                                Hi, {{ Auth::user()->name }}
                            </span>
        
                            {{-- LOGOUT BUTTON --}}
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        @endauth
        
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