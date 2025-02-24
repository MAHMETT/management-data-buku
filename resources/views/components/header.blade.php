<header class="bg-white flex items-center justify-between p-4">
    <h1 class="text-xl font-bold">Dashboard</h1>
    <div class="flex items-center space-x-4">
        <div class="relative group">
            <button class="flex items-center focus:outline-none gap-2">
                <img
                    src="https://via.placeholder.com/40"
                    alt="Profil"
                    class="w-10 h-10 rounded-full"
                />
                <span class="text-gray-700 font-medium">
                    {{ Auth::user()->name }}
                </span>
            </button>
            {{-- DropDown --}}
            <x-dropdown />
        </div>
    </div>
</header>
