<x-body-auth titlePage="Login">
    <h1 class="text-3xl font-bold text-gray-900">Login</h1>
    {{--
        @if (session('error'))
        <div class="bg-red-300 p-4 text-center rounded-lg border">
        {{ session('error') }}
        </div>
        @endif
    --}}

    <form
        action="{{ route('loginProsses') }}"
        method="post"
        class="flex flex-col gap-3 w-full"
    >
        @csrf
        <div class="flex flex-col gap-2">
            <x-label>Email</x-label>
            <input
                type="email"
                name="email"
                id=""
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                class="border border-gray-900 p-1.5 rounded-md w-full"
            />
            @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <x-label>Password</x-label>
            <input
                type="password"
                name="password"
                id=""
                placeholder="Masukkan password"
                class="border border-gray-900 p-1.5 rounded-md w-full"
            />
            @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <x-submitbtn type="submit">Login</x-submitbtn>
    </form>
</x-body-auth>
