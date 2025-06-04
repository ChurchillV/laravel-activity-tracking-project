<x-layout>
    <h2>{{$log->title}}</h2>

    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Status:</strong>{{$log->status}}</p>
        <p><strong>Details:</strong></p>
        <p>{{ $log->content }}</p>
    </div>

    <form action="{{ route('logs.destroy', $log->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn my-4">Delete Log</button>
    </form>
</x-layout>
