<x-body>
    <x-head href="{{ route('peminjaman.index') }}">Edit Peminjaman</x-head>
    <form
        action="{{ route('peminjaman.update', $peminjaman->id) }}"
        method="post"
        class="flex flex-col items-center gap-3"
    >
        @csrf
        @method('PUT')
        {{-- Added PUT method for RESTful update --}}

        {{-- Loan Date Input --}}
        <div class="flex flex-col gap-2 w-full">
            <x-label>Tanggal Peminjaman</x-label>
            <input
                type="date"
                name="tgl_peminjaman"
                id="tgl_peminjaman"
                placeholder="Masukkan tanggal peminjaman"
                class="p-1.5 rounded-md w-full border border-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                {{-- Added focus states for better UX --}}
                value="{{ old('tgl_peminjaman', $peminjaman->tgl_peminjaman ?? date('Y-m-d')) }}"
                {{-- Added old() helper for form persistence --}}
                required
                {{-- Added required attribute --}}
            />
            @error('tgl_peminjaman')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        {{-- Member Selection --}}
        <div class="flex flex-col gap-2 w-full">
            <x-label>Anggota</x-label>
            {{-- Fixed incorrect label --}}
            <select
                name="anggota_id"
                id="anggota_id"
                class="p-1.5 rounded-md border border-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800"
                {{-- Improved styling and consistency --}}
                required
                {{-- Added required attribute --}}
            >
                <option value="" disabled>Pilih Anggota</option>
                {{-- Improved placeholder text --}}
                @foreach ($anggota as $a)
                    <option
                        value="{{ $a->id }}"
                        {{ old('anggota_id', $peminjaman->anggota_id) == $a->id ? 'selected' : '' }}
                        {{-- Added old() helper for form persistence --}}
                    >
                        {{ $a->nama_anggota }}
                    </option>
                @endforeach
            </select>
            @error('anggota_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        {{-- Book Catalog Section --}}
        <div class="flex flex-col gap-2 w-full">
            <x-h3>Katalog Buku</x-h3>

            {{-- Search Input for Filtering Books --}}
            <div class="mb-2">
                <input
                    type="text"
                    id="book-search"
                    placeholder="Cari buku..."
                    class="p-1.5 rounded-md w-full border border-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            {{-- Book Catalog Container --}}
            <div
                class="overflow-y-scroll h-96 bg-gray-100 p-4 rounded border border-gray-300"
            >
                {{-- Get previously selected book IDs - Fixed to handle cases where relationship might not be loaded --}}
                @php
                    // Check if it's a new loan or if books relation exists
                    $selectedBookIds = [];

                    // Get currently selected books from the pivot table
                    if (isset($peminjaman) && $peminjaman->exists) {
                        // Check if we have a pivot table for buku_peminjaman
                        $selectedBooks = DB::table('peminjaman_bukus')
                            ->where('peminjaman_id', $peminjaman->id)
                            ->pluck('buku_id')
                            ->toArray();

                        if (! empty($selectedBooks)) {
                            $selectedBookIds = $selectedBooks;
                        }
                    }

                    // Use old input if available (in case of validation errors)
                    $selectedBookIds = old('buku_ids', $selectedBookIds);
                @endphp

                <div
                    id="book-catalog"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                >
                    @foreach ($bukus as $buku)
                        <div
                            class="book-item flex flex-col items-center p-4 border rounded-md shadow-sm bg-white hover:shadow-md transition-shadow"
                        >
                            <div class="mb-2">
                                @if ($buku->cover)
                                    <img
                                        src="{{ asset('storage/' . $buku->cover) }}"
                                        alt="{{ $buku->judul }}"
                                        {{-- Added alt text for accessibility --}}
                                        class="w-20 h-24 object-cover rounded"
                                        {{-- Slightly larger and rounded images --}}
                                    />
                                @else
                                    <img
                                        src="{{ asset('img/default-cover.jpg') }}"
                                        alt="Default Cover"
                                        class="w-20 h-24 object-cover rounded"
                                    />
                                @endif
                            </div>

                            <div class="flex items-center mt-2">
                                <input
                                    type="checkbox"
                                    name="buku_ids[]"
                                    id="buku_{{ $buku->id }}"
                                    value="{{ $buku->id }}"
                                    class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                    {{ is_array($selectedBookIds) && in_array($buku->id, $selectedBookIds) ? 'checked' : '' }}
                                    {{-- Fixed check for selected books --}}
                                />
                                <label
                                    for="buku_{{ $buku->id }}"
                                    class="ml-2 text-sm"
                                >
                                    <span class="font-medium">
                                        {{ $buku->judul }}
                                    </span>
                                    <span class="block text-xs text-gray-500">
                                        {{ $buku->pengarang ?? 'Unknown' }}
                                    </span>
                                    {{-- Added author if available --}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- No Books Found Message --}}
                <div
                    id="no-books-message"
                    class="hidden text-center py-8 text-gray-500"
                >
                    Tidak ada buku yang sesuai dengan pencarian
                </div>
            </div>
            @error('buku_ids')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit Button --}}
        <div class="flex gap-2 mt-4">
            <x-submitbtn type="submit">Simpan Perubahan</x-submitbtn>
            {{-- Improved button text --}}
        </div>
    </form>

    {{-- Search Functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('book-search')
            const bookItems = document.querySelectorAll('.book-item')
            const noBooksMessage = document.getElementById('no-books-message')

            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase()
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

                // Show/hide "no books found" message
                if (visibleCount === 0) {
                    noBooksMessage.classList.remove('hidden')
                } else {
                    noBooksMessage.classList.add('hidden')
                }
            })
        })
    </script>
</x-body>
