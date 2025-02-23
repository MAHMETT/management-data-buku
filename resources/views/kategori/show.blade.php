    <x-body>

        <x-header />
        <div class="flex flex-col w-full justify-start">
            <x-h3>Kategori</x-h3>
        </div>
        <table>
            <tbody>
                <tr>
                    <td>Nama Kategori</td>
                    <td>:</td>
                    <td>{{ $kategori->nama_kategori}}</td>
                </tr>
            </tbody>
        </table>
        
        <x-footer />
    </x-body>