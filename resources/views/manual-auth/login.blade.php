<x-body-auth titlePage="Login" >
    <h1 class="text-3xl font-bold text-gray-900">Login</h1>
    <form action="{{ route('loginProsses') }}" method="post" class="flex flex-col gap-3 w-full">
        @csrf
        <div class="flex flex-col gap-2">
            <x-label>Email</x-label>
            <input type="email" name="email" id="" placeholder="Masukkan email" class="border border-gray-900 p-1.5 rounded-md w-full">
        </div>
        <div class="flex flex-col gap-2">
            <x-label>Password</x-label>
            <input type="password" name="password" id="" placeholder="Masukkan password" class="border border-gray-900 p-1.5 rounded-md w-full">
        </div>
        <x-submitbtn type="submit">Login</x-submitbtn>
    </form>
</x-body-auth>