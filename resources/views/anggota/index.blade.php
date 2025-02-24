    <x-body>
        <div class="flex flex-col w-full justify-start gap-5">
            <x-h3>Anggota</x-h3>
            <x-a href="{{ route('anggota.create') }}">Tambah</x-a>
        </div>
        <table>
            <thead>
                <tr ">
                    <th>No.</th>
                    <th>Nama Anggota</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allAnggota as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $r->nama_anggota }}</td>
                    <td>
                        <form action="{{ route('anggota.destroy', $r->id) }}" method="POST" class="flex gap-2">
                            <x-a href="{{ route('anggota.show', $r->id) }}">Detail</x-a>
                            <x-a bg="green" href="{{ route('anggota.edit', $r->id) }}">Edit</x-a>
                            
                            @csrf
                            @method('DELETE')
                            <x-submitbtn bg="red" type="submit">Hapus</x-submitbtn>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-body>