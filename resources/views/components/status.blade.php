@props([
    'status_done' => false,
    'status_pending' => false
])

<span @class([
    'status-pending' => $status_pending,
    'status-done' => $status_done,
    'status'])>
    {{ $slot }}
</span>
