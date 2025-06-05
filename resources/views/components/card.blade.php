@props([
    'highlight_done' => false,
    'highlight_pending' => false
])

<div @class([
    'highlight-pending' => $highlight_pending,
    'highlight-done' => $highlight_done,
    'card'])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}" class="btn">View details</a>
</div>
