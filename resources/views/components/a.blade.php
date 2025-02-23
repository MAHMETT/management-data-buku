@php
    $bgcolorMap = [
        'blue' => 'bg-blue-600',
        'red' => 'bg-red-500',
        'green' => 'bg-green-500',
];

$bgColor = $bgcolorMap[$bg] ?? 'bg-blue-600';
@endphp

<div>
    <a  class="flex p-3 rounded-md font-bold cursor-pointer text-center justify-center {{ $bgColor }} hover:opacity-75"
        href="{{ $href }}">
        {{$slot}}
    </a>
</div>