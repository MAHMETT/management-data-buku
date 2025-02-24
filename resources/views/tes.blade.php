<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout Tes</title>
    <link rel="stylesheet" 
        href="https://fonts.googleapis.com/css2?family=Material+Icons" 
        />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-800 text-green-100 flex flex-col">
            <div class="p-4 text-center text-lg font-bold bg-gray-900 text-white">
                Panel Admin
            </div>
            <nav class="flex-1">
                <ul class="space-y-2 p-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded
                    hover:bg-gray-700 gap-2">
                        <x-icon>dashboard</x-icon>
                        <span>Dashboard</span>
                    </a>
                </ul>
                <ul class="space-y-2 p-4">
                    <a href="{{ route('kategori.index') }}" class="flex items-center p-2 rounded
                    hover:bg-gray-700 gap-2">
                        <x-icon>folder</x-icon>
                        <span>Kategori</span>
                    </a>
                </ul>
                <ul class="space-y-2 p-4">
                    <a href="{{ route('penerbit.index') }}" class="flex items-center p-2 rounded
                    hover:bg-gray-700 gap-2">
                        <x-icon>newspaper</x-icon>
                        <span>Penerbit</span>
                    </a>
                </ul>
                <ul class="space-y-2 p-4">
                    <a href="{{ route('buku.index') }}" class="flex items-center p-2 rounded
                    hover:bg-gray-700 gap-2">
                        <x-icon>menu_book</x-icon>
                        <span>Buku</span>
                    </a>
                </ul>
            </nav>
            @if (Auth::check()) 
                <div class="w-full flex justify-center items-center gap-3 p-2">
                    <form action="{{ route('logout')}}" method="post" class="flex items-center gap-2 p-2 w-full justify-start hover:bg-gray-700 cursor-pointer">
                        @csrf
                        <button type="submit" class="flex items-center gap-2">
                            <x-icon>logout</x-icon>
                            Logout
                        </button>
                    </form>
                </div>
            @endif
        </aside>

        {{-- Header --}}
        <div class="flex flex-1 flex-col">
            <header class="bg-white flex items-center justify-between p-4">
                <h1 class="text-xl font-bold">
                    Dashboard
                </h1>
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button class="flex items-center focus:outline-none gap-2">
                            <img src="https://via.placeholder.com/40" alt="Profil" class="w-10 h-10 rounded-full">
                            <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                        </button>
                        {{-- DropDown --}}
                        <div class="absolute right-0 mt-0 w-48 bg-white border border-gray-200 rounded shadow-lg hidden group-hover:block">
                            <x-a-drop href="#">Edit Profile</x-a-drop>
                            <x-a-drop href="#">Settings</x-a-drop>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Main-Content --}}
            <main class="flex-1 p-6">
                <div class="bg-white rounded shadow p-4">
                    <h2 class="text-xl font-bold">Selamat Datang {{ Auth::user()->name }}</h2>
                    <p class="font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus est commodi ex nulla, similique atque dolorum mollitia libero veritatis perferendis suscipit enim odio quis rem, quam itaque doloremque. Obcaecati, consequatur?</p>
                </div>
            </main>
        </div>
    </div>
</body>
</html>