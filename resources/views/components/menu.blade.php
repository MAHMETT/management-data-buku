<ul class="space-y-2 p-4">
    <a
        href="{{ $href }}"
        class="flex items-center p-2 rounded hover:bg-gray-700 gap-2"
    >
        <x-icon>{{ $icon }}</x-icon>
        <span>{{ $slot }}</span>
    </a>
</ul>
