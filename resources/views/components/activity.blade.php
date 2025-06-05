<div class="relative bg-green-100 p-3 rounded-lg shadow mb-3 max-w-md mr-auto text-sm">
    <div class="font-bold text-green-800">
        <a class="link hover:underline" href="{{ route('logs.show', $activityId)}}">
            {{ $activityName }}
        </a>
    </div>
    <div class="mt-1 text-green-900">
        {{ $action }} by
        <span class="text-blue-600 font-semibold">{{ $userName ?? 'Unknown' }}</span>
    </div>
    <div class="text-xs text-gray-500 absolute bottom-1 right-2">
        {{ $timestamp }}
    </div>
</div>
