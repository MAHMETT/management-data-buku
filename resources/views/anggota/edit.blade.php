<x-body>
    <x-head href="{{ route('anggota.index') }}">Edit Anggota</x-head>
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
            @error('nama_anggota')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Alamat</x-label>
            <input
                type="text"
                name="alamat"
                id=""
                placeholder="Masukkan Alamat "
                value="{{ $anggota->alamat }}"
                class="p-1.5 rounded-md w-full border border-gray-800 focus:border-black"
            />
            @error('alamat')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>No. Telepon</x-label>
            <input
                type="text"
                name="no_telpon"
                id=""
                placeholder="Masukkan No. Telepon "
                value="{{ $anggota->no_telpon }}"
                class="p-1.5 rounded-md w-full border border-gray-800 focus:border-black"
            />
            @error('no_telpon')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <x-submitbtn type="submit">Update</x-submitbtn>
    </form>
</x-body>
