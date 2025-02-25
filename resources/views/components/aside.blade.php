<aside class="w-64 bg-gray-800 text-green-100 flex flex-col">
    <div class="p-4 text-center text-lg font-bold bg-gray-900 text-white">
        Panel Admin
    </div>
    <nav class="flex-1">
        <x-menu href="{{ route('dashboard') }}" icon="dashboard">
            Dashboard
        </x-menu>
        <x-menu href="{{ route('kategori.index') }}" icon="folder">
            Kategori
        </x-menu>
        <x-menu href="{{ route('penerbit.index') }}" icon="newspaper">
            Penerbit
        </x-menu>
        <x-menu href="{{ route('buku.index') }}" icon="book">Buku</x-menu>
        <x-menu href="{{ route('anggota.index') }}" icon="people">
            Anggota
        </x-menu>
        <x-menu href="{{  route('peminjaman.index') }}" icon="people">
            Peminjaman Buku
        </x-menu>
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
