<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ $titlePage }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        class="flex min-h-screen justify-center items-center gap-5 bg-gray-800"
    >
        <div
            class="flex flex-col max-w-[75rem] min-w-[25rem] gap-4 justify-center items-center bg-white p-5 shadow-md rounded-xl"
        >
            {{ $slot }}
        </div>
        @include('sweetalert::alert')
    </body>
</html>
