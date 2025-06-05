@php
    $logStatuses = ['Pending', 'Done'];
@endphp

<x-layout>
    <h1 class="mb-3">
        Create New Activity
    </h1>

    <form action="{{ route('logs.store') }}" method="POST">
        <!-- CSRF token for security -->
        @csrf


        <!-- Name -->
        <label for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <!-- select a status -->
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="" disabled>Select status</option>
            @foreach ($logStatuses as $status)
                <option value="{{ $status }}" {{ $status == old('status') ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn mt-4">Create Activity</button>

        <!-- validation errors -->
        <x-errors />
    </form>

</x-layout>
