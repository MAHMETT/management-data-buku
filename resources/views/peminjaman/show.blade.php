<x-body>
    <div class="flex flex-col item-center gap-4">
        <x-head href="{{ route('peminjaman.index') }}">
            Detail Peminjaman
        </x-head>
        <div class="border p-4">
            <p>
                <strong>Tanggal Peminjaman :</strong>
                {{ $peminjaman->tgl_peminjaman }}
            </p>
            <p>
                <strong>Anggota :</strong>
                {{ $peminjaman->anggota->nama_anggota }}
            </p>
            <p>
                <strong>Status Peminjaman :</strong>
                {{ $peminjaman->status_peminjaman }}
            </p>
        </div>
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Cover</th>
                        <th class="w-2/3">Judul Buku</th>
                    </tr>
                </thead>
                @foreach ($peminjaman->buku as $key => $buku)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if ($buku->cover)
                                <img
                                    src="{{ asset('storage/' . $buku->cover) }}"
                                    alt="Cover"
                                    class="w-24 h-28 object-cover"
                                />
                            @else
                                <img
                                    src="{{ asset('img/default-cover.jpg') }}"
                                    alt="Cover"
                                    class="w-24 h-28 object-cover"
                                />
                            @endif
                        </td>
                        <td>{{ $buku->judul }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        @if ($peminjaman->status_peminjaman == 'Dipinjam')
            <div class="flex flex-col gap-2">
                <x-h3>Pengembalian Buku</x-h3>
                <form
                    action="{{ route('peminjaman.update', $peminjaman->id) }}"
                    method="post"
                    class="flex flex-col gap-2 max-w-60"
                >
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-2">
                        <x-label>Tanggal Pengembalian</x-label>
                        <input
                            type="date"
                            name="tgl_kembali"
                            id=""
                            placeholder="Masukkan judul buku"
                            value="{{ date('Y-m-d') }}"
                            class="p-1.5 rounded-md border border-gray-800"
                        />
                    </div>
                    <x-submitbtn type="submit" bg="green">
                        Proses Pengembalian
                    </x-submitbtn>
                </form>
            </div>
        @endif
    </div>
</x-body>
