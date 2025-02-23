<div class="w-full flex flex-col justify-center items-center gap-3">
<h1 class="text-2xl font-bold text-gray-900">Managemen Data Buku</h1>
@if (Auth::check())
<div class="w-full flex flex-col justify-center items-center gap-3">
    <p class="text-gray-900">Anda login sebagai <strong>{{ Auth::user()->name }}</strong></p>
    <form action="{{ route('logout')}}" method="post">
        @csrf
        <x-submitbtn bg="red">Logout</x-submitbtn>
    </form>
</div>
@endif
<div class="flex text-white">
    <ul class="flex gap-3">
    <li><x-a href="/kategori">Kategori</x-a></li>
    <li><x-a href="/penerbit">Penerbit</x-a></li>
    <li><x-a href="/buku">Buku</x-a></li>
</div>
</div>