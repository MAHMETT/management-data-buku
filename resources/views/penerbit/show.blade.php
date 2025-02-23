    <x-body>

        <x-header />
        <div class="flex flex-col w-full justify-start">
            <x-h3>Penerbit</x-h3>
        </div>
        <table>
            <tbody>
                <tr>
                    <td>Nama Penerbit</td>
                    <td>:</td>
                    <td>{{ $penerbit->nama_penerbit}}</td>
                </tr>
            </tbody>
        </table>
        
        <x-footer />
    </x-body>