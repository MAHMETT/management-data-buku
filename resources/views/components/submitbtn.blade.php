@php
    $bgcolorMap = [
        'blue' => 'bg-blue-600',
        'red' => 'bg-red-500',
        'green' => 'bg-green-500',
];

$bgColor = $bgcolorMap[$bg] ?? 'bg-blue-600';
@endphp

<button type="{{ $type }}" class="flex p-3 rounded-md {{ $bgColor }} text-white font-bold text-center justify-center items-center hover:opacity-75">{{ $slot }}</button>
