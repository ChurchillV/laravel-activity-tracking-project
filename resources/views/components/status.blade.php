@props([
    'status_done' => false,
    'status_pending' => false
])

<span @class([
    'bg-blue-100 text-blue-500' => $status_pending,
    'bg-green-100 text-green-500' => $status_done,
    'text-xs p-1 ms-1 rounded-lg'])>
    {{ $slot }}
</span>
