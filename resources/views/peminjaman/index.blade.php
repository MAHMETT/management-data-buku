<x-body>
    <x-head href="{{ route('peminjaman.create') }}" btn="Tambah">
        Peminjaman
    </x-head>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Anggota</th>
                <th>Status Peminjaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allPeminjaman as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $r->tgl_peminjaman }}</td>
                    <td>{{ $r->anggota->nama_anggota }}</td>
                    <td>{{ $r->status_peminjaman }}</td>
                    <td>
                        <form
                            action="{{ route('peminjaman.destroy', $r->id) }}"
                            method="POST"
                            class="flex gap-2"
                        >
                            @csrf
                            @method('DELETE')
                            <x-a href="{{ route('peminjaman.show', $r->id) }}">
                                Detail
                            </x-a>
                            <x-a
                                bg="green"
                                href="{{ route('peminjaman.edit', $r->id) }}"
                            >
                                Edit
                            </x-a>

                            <x-submitbtn bg="red" type="submit">
                                Hapus
                            </x-submitbtn>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-body>
