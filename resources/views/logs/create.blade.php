@php
    $logStatuses = ['To do', 'In Progress', 'Done'];
@endphp

<x-layout>
    <h1>
        Create New Log
    </h1>

    <form action="{{ route('logs.store') }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <h2>Create a New Log</h2>

        <!-- Title -->
        <label for="name">Log Title:</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            required
        >

        <!-- Content -->
        <label for="content">Content:</label>
        <textarea
            rows="5"
            id="content"
            name="content"
            required
        >
            {{ old('content') }}
        </textarea>

        <!-- select a status -->
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="" disabled>Select status</option>
            @foreach ($logStatuses as $status)
                <option value="{{ $status }}" {{ $status == old('status') ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>

         <!-- Hidden field for created_by -->
        <input type="hidden" name="created_by" id="created_by" value=1> <!-- Hard-coded user id -->

        <button type="submit" class="btn mt-4">Create Log</button>

        <!-- validation errors -->
        @if($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>

</x-layout>
