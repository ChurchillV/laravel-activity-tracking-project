@props([
    'highlight_done' => false,
    'highlight_pending' => false
])

<div @class([
    'border-l-blue-500' => $highlight_pending,
    'border-l-green-500' => $highlight_done,
    'bg-white rounded border border-gray-200 px-3 py-3 my-2 flex flex-col md:flex-row md:justify-between items-start border-l-4'])>
    <div>
        {{ $slot }}
    </div>

    <div class="mt-2 md:mt-0">
        <a href="{{ $attributes->get('href') }}" class="rounded px-3 py-2 bg-green-200 hover:bg-green-500 hover:text-white cursor-pointer text-center md:flex w-fit">View details</a>
    </div>
</div>
