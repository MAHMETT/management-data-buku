<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ $titlePage }}</title>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Icons"
        />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <div class="flex h-screen">
            {{-- Sidebar --}}
            <x-aside />
            <div class="flex flex-1 flex-col">
                {{-- Header --}}
                <x-header />
                {{-- Main-Content --}}
                <main class="flex-1 p-6">
                    <div
                        class="bg-white rounded shadow p-4 justify-center items-center"
                    >
                        {{ $slot }}
                    </div>
                </main>
                {{-- Footer --}}
                <footer class="flex w-full justify-center p-2">
                    <x-footer />
                </footer>
            </div>
        </div>
    </body>
</html>
