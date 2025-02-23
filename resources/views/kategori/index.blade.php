    <x-body>

        <x-header />
        <div class="flex flex-col w-full justify-start">
            <x-h3>Kategori</x-h3>
            <x-a href="{{ route('kategori.create') }}">Tambah</x-a>
        </div>
        <table>
            <thead>
                <tr ">
                    <th>No.</th>
                    <th class="w-full">Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allKategori as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $r->nama_kategori }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy', $r->id) }}" method="POST" class="flex gap-2">
                            <x-a href="{{ route('kategori.show', $r->id) }}">Detail</x-a>
                            <x-a bg="green" href="{{ route('kategori.edit', $r->id) }}">Edit</x-a>
                            
                            @csrf
                            @method('DELETE')
                            <x-submitbtn bg="red" type="submit">Hapus</x-submitbtn>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <x-footer />
    </x-body>