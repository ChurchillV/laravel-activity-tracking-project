@props([
    'status_todo' => false,
    'status_done' => false,
    'status_in_progress' => false
])

<span @class([
    'status-todo' => $status_todo,
    'status-in-progress' => $status_in_progress,
    'status-done' => $status_done,
    'status'])>
    {{ $slot }}
</span>
