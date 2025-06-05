@props([
    'highlight_done' => false,
    'highlight_pending' => false
])

<div @class([
    'highlight-pending' => $highlight_pending,
    'highlight-done' => $highlight_done,
    'card'])>
    <div>
        {{ $slot }}
    </div>

    <div class="mt-2 md:mt-0">
        <a href="{{ $attributes->get('href') }}" class="btn text-center md:flex w-fit">View details</a>
    </div>
</div>
