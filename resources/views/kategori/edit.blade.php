<x-body>
    <x-h3>Edit Kategori</x-h3>
    <form
        action="{{ route('kategori.update', $kategori->id) }}"
        method="POST"
        class="flex flex-col gap-3 w-full"
    >
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2 w-full">
            <x-label>Nama Kategori</x-label>
            <input
                type="text"
                name="nama_kategori"
                id=""
                value="{{ $kategori->nama_kategori }}"
                class="p-1.5 rounded-md w-full border border-gray-800"
            />
            @error('nama_kategori')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <x-submitbtn type="submit">Update</x-submitbtn>
    </form>
</x-body>
