<x-body>
    <x-h3>Buat Kategori</x-h3>
    <form
        action="{{ route('kategori.store') }}"
        method="POST"
        class="flex flex-col gap-3 w-full"
    >
        @csrf
        <div class="flex flex-col gap-2 w-full">
            <x-label>Nama Kategori</x-label>
            <input
                type="text"
                name="nama_kategori"
                id=""
                placeholder="Masukkan nama kategori"
                class="p-1.5 rounded-md w-full border border-gray-800 focus:border-black"
            />
        </div>
        <x-submitbtn type="submit">Submit</x-submitbtn>
    </form>
</x-body>
