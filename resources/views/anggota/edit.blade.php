<x-body>
    <x-h3>Edit Anggota</x-h3>
    <form
        action="{{ route('anggota.update', $anggota->id) }}"
        method="POST"
        class="flex flex-col gap-3 w-full"
    >
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2 w-full">
            <x-label>Nama Anggota</x-label>
            <input
                type="text"
                name="nama_anggota"
                id=""
                value="{{ $anggota->nama_anggota }}"
                class="p-1.5 rounded-md w-full border border-gray-800"
            />
        </div>
        <x-submitbtn type="submit">Update</x-submitbtn>
    </form>
</x-body>
