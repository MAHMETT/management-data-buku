<aside class="w-64 bg-gray-800 text-green-100 flex flex-col">
    <div class="p-4 text-center text-lg font-bold bg-gray-900 text-white">
        Panel Admin
    </div>
    <nav class="flex-1">
        <ul class="space-y-2 p-4">
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center p-2 rounded hover:bg-gray-700 gap-2"
            >
                <x-icon>dashboard</x-icon>
                <span>Dashboard</span>
            </a>
        </ul>
        <ul class="space-y-2 p-4">
            <a
                href="{{ route('kategori.index') }}"
                class="flex items-center p-2 rounded hover:bg-gray-700 gap-2"
            >
                <x-icon>folder</x-icon>
                <span>Kategori</span>
            </a>
        </ul>
        <ul class="space-y-2 p-4">
            <a
                href="{{ route('penerbit.index') }}"
                class="flex items-center p-2 rounded hover:bg-gray-700 gap-2"
            >
                <x-icon>newspaper</x-icon>
                <span>Penerbit</span>
            </a>
        </ul>
        <ul class="space-y-2 p-4">
            <a
                href="{{ route('buku.index') }}"
                class="flex items-center p-2 rounded hover:bg-gray-700 gap-2"
            >
                <x-icon>menu_book</x-icon>
                <span>Buku</span>
            </a>
        </ul>
    </nav>
    @if (Auth::check())
        <div class="w-full flex justify-center items-center gap-3 p-2">
            <form
                action="{{ route('logout') }}"
                method="post"
                class="flex items-center gap-2 p-2 w-full justify-start hover:bg-gray-700 cursor-pointer"
            >
                @csrf
                <button type="submit" class="flex items-center gap-2">
                    <x-icon>logout</x-icon>
                    Logout
                </button>
            </form>
        </div>
    @endif
</aside>
