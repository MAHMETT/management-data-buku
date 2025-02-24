<x-body>
    <x-h3>Buat Anggota</x-h3>
    <form
        action="{{ route('anggota.store') }}"
        method="POST"
        class="flex flex-col gap-3 w-full"
    >
        @csrf
        <div class="flex flex-col gap-2 w-full">
            <x-label>Nama Anggota</x-label>
            <input
                type="text"
                name="nama_anggota"
                id=""
                placeholder="Masukkan nama anggota"
                class="p-1.5 rounded-md w-full border border-gray-800 focus:border-black"
            />
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Alamat</x-label>
            <input
                type="text"
                name="alamat"
                id=""
                placeholder="Masukkan Alamat "
                class="p-1.5 rounded-md w-full border border-gray-800 focus:border-black"
            />
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>No. Telepon</x-label>
            <input
                type="text"
                name="no_telpon"
                id=""
                placeholder="Masukkan No. Telepon "
                class="p-1.5 rounded-md w-full border border-gray-800 focus:border-black"
            />
        </div>
        <x-submitbtn type="submit">Submit</x-submitbtn>
    </form>
</x-body>
