<x-body>
        <div class="flex flex-col w-full justify-start gap-5">
            <x-h3>Penerbit</x-h3>
            <x-a href="{{ route('penerbit.create') }}">Tambah</x-a>
        </div>
        <table class="w-full">
            <thead>
                <tr ">
                    <th>No.</th>
                    <th class="w-full">Nama Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allPenerbit as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $r->nama_penerbit }}</td>
                    <td>
                        <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST" class="flex gap-2">
                            <x-a href="{{ route('penerbit.show', $r->id) }}">Detail</x-a>
                            <x-a bg="green" href="{{ route('penerbit.edit', $r->id) }}">Edit</x-a>
                            
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