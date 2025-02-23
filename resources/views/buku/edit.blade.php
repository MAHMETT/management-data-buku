<x-body>
    <x-header />
    <x-h3>Edit Buku</x-h3>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="flex flex-col gap-3  w-full" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2 w-full">
            <x-label>Judul Buku</x-label>
            <input type="text" name="judul" id="" value="{{ $buku->judul }}" class="p-1.5 rounded-md w-full border border-gray-800">
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Pengarang</x-label>
            <input type="text" name="pengarang" id="" value="{{ $buku->pengarang }}" class="p-1.5 rounded-md w-full border border-gray-800">
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Tahun Terbit</x-label>
            <input type="text" name="tahun_terbit" id="" value="{{ $buku->tahun_terbit }}" class="p-1.5 rounded-md w-full border border-gray-800">
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Penerbit</x-label>
            <select name="penerbit_id" id="" class="p-1.5 rounded-md text-gray-600 dark:text-gray-600 ">
                <option value="" disabled selected class="text-gray-600 dark:text-gray-600 ">Pilih Nama Penerbit</option>
                @foreach ($penerbit as $p)
                    <option value="{{ $p->id}}" {{ ( $p->id == $buku->penerbit_id ? 'selected' : '') }} class="text-gray-600 dark:text-gray-600 ">{{ $p->nama_penerbit }}</option>
                @endforeach
            </select> 
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Kategori</x-label>
            <select name="kategori_id" id="" class="p-1.5 rounded-md text-gray-600 dark:text-gray-600 ">
                <option value="" disabled selected class="text-gray-600 dark:text-gray-600 ">Pilih Nama Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id}}" {{ ( $k->id == $buku->kategori_id ? 'selected' : '') }} class="text-gray-600 dark:text-gray-600 ">{{ $k->nama_kategori }}</option>
                @endforeach
            </select> 
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Gambar Cover</x-label>
            @if ($buku->cover)
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Lama" width="100">
            @endif
            <input type="file" name="file_cover" id="" class="p-1.5 rounded-md w-full  border border-gray-800">
        </div>
        <input type="hidden" name="cover_lama" value="{{ $buku->cover }}">
        <x-submitbtn type="submit">Update</x-submitbtn>
    </form>

    <x-footer />
</x-body>