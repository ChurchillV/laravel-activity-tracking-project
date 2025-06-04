@props([
    'highlight_todo' => false,
    'highlight_done' => false,
    'highlight_in_progress' => false
])

<div @class([
    'highlight-todo' => $highlight_todo,
    'highlight-in-progress' => $highlight_in_progress,
    'highlight-done' => $highlight_done,
    'card'])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}" class="btn">View details</a>
</div>
