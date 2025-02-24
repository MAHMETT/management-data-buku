    <x-body>

        <x-header />
        <div class="flex flex-col w-full justify-start">
            <x-h3>Buku</x-h3>
            <div class="flex justify-between">
                <x-a href="{{ route('buku.create') }}">Tambah</x-a>
                <form action="{{ route('buku.index') }}" method="get" class="flex gap-2">
                    <input type="text" name="q" id="" class="p-1.5 rounded-md w-full  border border-gray-800" placeholder="Judul Buku...">
                    <x-submitbtn type="submit">Search</x-submitbtn>
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr ">
                    <th>No.</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allBuku as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if ($r->cover)
                            <img src="{{ asset('storage/' . $r->cover) }}" alt="Cover" width="100">
                        @endif
                    </td>
                    <td>{{ $r->judul }}</td>
                    <td>{{ $r->pengarang }}</td>
                    <td>{{ $r->tahun_terbit }}</td>
                    <td>{{ $r->penerbit->nama_penerbit }}</td>
                    <td>{{ $r->kategori->nama_kategori }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $r->id) }}" method="POST" class="flex gap-2">
                            <x-a href="{{ route('buku.show', $r->id) }}">Detail</x-a>
                            <x-a bg="green" href="{{ route('buku.edit', $r->id) }}">Edit</x-a>
                            
                            @csrf
                            @method('DELETE')
                            <x-submitbtn bg="red" type="submit">Hapus</x-submitbtn>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $allBuku->links('vendor.pagination.tailwind') }}
        </div>
        <x-footer />
    </x-body>