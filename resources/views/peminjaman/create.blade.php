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
            @error('tgl_peminjaman')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-full">
            <x-label>Anggota</x-label>
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
            @error('anggota_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="flex flex-col gap-2">
                <x-h3>Katalog Buku</x-h3>
                <input
                    type="text"
                    id="book-search"
                    placeholder="Cari buku..."
                    class="p-2 rounded-md border border-gray-700 hover:border-gray-800"
                />
                <div class="overflow-y-scroll h-96 bg-gray-100 p-4 rounded">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                    >
                        @foreach ($bukus as $buku)
                            <div
                                class="book-item flex flex-col items-center p-4 border rounded-sm shadow-sm bg-white gap-2 hover:shadow-md transition-shadow"
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
                                        id="buku_{{ $buku->id }}"
                                        value="{{ $buku->id }}"
                                        class="form-checkbox"
                                    />
                                    <label
                                        for="buku_{{ $buku->id }}"
                                        class="ml-2 text-sm"
                                    >
                                        <span class="font-medium">
                                            {{ $buku->judul }}
                                        </span>
                                        <span
                                            class="block text-xs text-gray-500"
                                        >
                                            {{ $buku->pengarang ?? 'Unknown' }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        @endforeach

                        <div id="no-book-message" class="hidden">
                            Buku tidak ditemukan
                        </div>
                    </div>
                </div>
                @error('buku_ids')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <x-submitbtn type="submit">Submit</x-submitbtn>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('book-search')
            const bookItems = document.querySelectorAll('.book-item')
            const noBookMessage = document.getElementById('no-book-message')

            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase()
                let visibleCount = 0

                bookItems.forEach((item) => {
                    const title = item
                        .querySelector('label')
                        .textContent.toLowerCase()

                    if (title.includes(searchTerm)) {
                        item.style.display = 'flex'
                        visibleCount++
                    } else {
                        item.style.display = 'none'
                    }
                })

                if (visibleCount === 0) {
                    noBookMessage.classList.remove('hidden')
                } else {
                    noBookMessage.classList.add('hidden')
                }
            })
        })
    </script>
</x-body>
