    <x-body>

        <x-header />
        <div class="flex flex-col w-full justify-start">
            <x-h3>Buku</x-h3>
        </div>
        @if ($buku->cover)
            <div class="text-center border border-gray-900 rounded-md p-2 max-w-[45rem] max-h-[25]">
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="">
            </div>
        @endif
        <table>
            <tbody id="tr">
                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td>{{ $buku->judul}}</td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>:</td>
                    <td>{{ $buku->pengarang}}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td>{{ $buku->tahun_terbit}}</td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td>{{ $buku->penerbit->nama_penerbit}}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td>{{ $buku->kategori->nama_kategori}}</td>
                </tr>
            </tbody>
        </table>
        
        <x-footer />
    </x-body>