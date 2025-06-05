@php
    $logStatuses = ['Pending', 'Done'];
@endphp

<x-layout>
  <div class="flex items-center justify-center min-h-screen bg-green-50">
    <form action="{{ route('logs.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
      @csrf

      <h1 class="text-2xl font-bold text-green-600 mb-6 text-center">Create New Activity</h1>

      <!-- Name -->
      <label for="name" class="block text-green-700 font-semibold">Name:</label>
      <input
        class="block w-full mt-2 mb-4 p-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400"
        type="text"
        id="name"
        name="name"
        value="{{ old('name') }}"
        required
      >

      <!-- Status -->
      <label for="status" class="block text-green-700 font-semibold">Status:</label>
      <select
        id="status"
        name="status"
        class="block w-full mt-2 mb-4 p-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400"
      >
        <option value="" disabled selected>Select status</option>
        @foreach ($logStatuses as $status)
          <option value="{{ $status }}" {{ $status == old('status') ? 'selected' : '' }}>{{ $status }}</option>
        @endforeach
      </select>

      <button type="submit" class="w-full py-2 px-4 bg-green-500 text-white rounded hover:bg-green-600 transition mt-4">
        Create Activity
      </button>

      <!-- validation errors -->
      <x-errors class="mt-4" />
    </form>
  </div>
</x-layout>
