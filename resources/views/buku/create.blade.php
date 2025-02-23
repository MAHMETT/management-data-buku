<x-body>
    <x-header />
    <x-h3>Buat Buku</x-h3>
    <form action="{{ route('buku.store') }}" method="POST" class="flex flex-col gap-3  w-full">
        @csrf
        <div class="flex flex-col gap-2 w-full">
            <x-label>Judul Buku</x-label>
            <input type="text" name="judul" id="" placeholder="Masukkan judul buku" class="p-1.5 rounded-md w-full  border border-gray-800">
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Pengarang</P></x-label>
            <input type="text" name="pengarang" id="" placeholder="Masukkan nama pengarang" class="p-1.5 rounded-md w-full  border border-gray-800">
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Tahun Terbit</x-label>
            <input type="text" name="tahun_terbit" id="" placeholder="Masukkan tahun terbit" class="p-1.5 rounded-md w-full  border border-gray-800">
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Penerbit</x-label>
            <select name="penerbit_id" id="" class="p-1.5 rounded-md text-gray-600 dark:text-gray-600 ">
                <option value="" disabled selected class="text-gray-600 dark:text-gray-600 ">Pilih Nama Penerbit</option>
                @foreach ($penerbit as $p)
                    <option value="{{ $p->id}}" class="text-gray-600 dark:text-gray-600 ">{{ $p->nama_penerbit }}</option>
                @endforeach
            </select> 
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Kategori</x-label>
            <select name="kategori_id" id="" class="p-1.5 rounded-md text-gray-600 dark:text-gray-600 ">
                <option value="" disabled selected class="text-gray-600 dark:text-gray-600 ">Pilih Nama Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id}}" class="text-gray-600 dark:text-gray-600 ">{{ $k->nama_kategori }}</option>
                @endforeach
            </select> 
        </div>
        <x-submitbtn type="submit">Submit</x-submitbtn>
    </form>

    <x-footer />
</x-body>