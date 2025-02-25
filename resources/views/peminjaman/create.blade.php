<x-body>
    <x-head href="{{ route('peminjaman.index') }}">Buat Peminjaman</x-head>
    <form
        action="{{ route('peminjaman.store') }}"
        method="post"
        class="flex flex-col items-center gap-3"
    >
        @csrf
        <div class="flex flex-col gap-2 w-full">
            <x-label>Tanggal Peminjaman</x-label>
            <input
                type="date"
                name="tgl_peminjaman"
                id=""
                placeholder="Masukkan tanggal peminjaman"
                class="p-1.5 rounded-md w-full border border-gray-800"
                anggota
                value="{{ date('Y-m-d') }}"
            />
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Tanggal Peminjaman</x-label>
            <select
                name="anggota_id"
                id=""
                class="p-1.5 rounded-md text-gray-600 dark:text-gray-600"
            >
                <option
                    value=""
                    disabled
                    selected
                    class="text-gray-600 dark:text-gray-600"
                >
                    Pilih Nama Anggota
                </option>
                @foreach ($anggota as $a)
                    <option
                        value="{{ $a->id }}"
                        class="text-gray-600 dark:text-gray-600"
                    >
                        {{ $a->nama_anggota }}
                    </option>
                @endforeach
            </select>
            <div class="">
                <x-h3>Katalog Buku</x-h3>
                <div class="overflow-y-scroll h-96 bg-gray-300 p-4 rounded">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                    >
                        @foreach ($bukus as $buku)
                            <div
                                class="flex flex-col items-center p-4 border rounded-sm shadow-sm"
                            >
                                @if ($buku->cover)
                                    <img
                                        src="{{ asset('storage/' . $buku->cover) }}"
                                        alt="Cover"
                                        class="w-16 h-20 object-cover"
                                    />
                                @else
                                    <img
                                        src="{{ asset('img/default-cover.jpg') }}"
                                        alt="Cover"
                                        class="w-16 h-20 object-cover"
                                    />
                                @endif

                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buku_ids[]"
                                        id=""
                                        value="{{ $buku->id }}"
                                        class="form-checkbox"
                                    />
                                    <span class="text-sm text-center">
                                        {{ $buku->judul }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <x-submitbtn type="submit">Submit</x-submitbtn>
    </form>
</x-body>
