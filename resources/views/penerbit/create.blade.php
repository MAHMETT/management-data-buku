<x-body>
    <x-h3>Buat Penerbit</x-h3>
    <form
        action="{{ route('penerbit.store') }}"
        method="POST"
        class="flex flex-col gap-3 w-full"
    >
        @csrf
        <div class="flex flex-col gap-2 w-full">
            <x-label>Nama Penerbit</x-label>
            <input
                type="text"
                name="nama_penerbit"
                id=""
                placeholder="Masukkan nama penerbit"
                class="p-1.5 rounded-md w-full border border-gray-800"
            />
        </div>
        <x-submitbtn type="submit">Submit</x-submitbtn>
    </form>
</x-body>
