<x-layout>
    <h2>{{$log->title}}</h2>
    
    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Status:</strong>{{$log->status}}</p>
        <p><strong>Details:</strong></p>
        <p>{{ $log->content }}</p>
    </div>
</x-layout>
