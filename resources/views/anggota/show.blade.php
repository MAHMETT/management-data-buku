<x-body>
    <x-head href="{{ route('anggota.index') }}">Anggota</x-head>
    <table>
        <tbody>
            <tr>
                <td>Nama Anggota</td>
                <td>:</td>
                <td>{{ $anggota->nama_anggota }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $anggota->alamat }}</td>
            </tr>
            <tr>
                <td>No. Telpon</td>
                <td>:</td>
                <td>{{ $anggota->no_telpon }}</td>
            </tr>
        </tbody>
    </table>
</x-body>
