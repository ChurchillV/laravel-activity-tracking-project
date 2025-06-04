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
        ></textarea>

        <!-- select a status -->
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="" disabled selected>Select status</option>
            <option value="To do" selected>To Do</option>
            <option value="In Progress" selected>In Progress</option>
            <option value="Done" selected>Done</option>
        </select>

         <!-- Hidden field for created_by -->
        <input type="hidden" name="created_by" value=1> <!-- Hard-coded user id -->

        <button type="submit" class="btn mt-4">Create Log</button>

        <!-- validation errors -->

    </form>

</x-layout>
