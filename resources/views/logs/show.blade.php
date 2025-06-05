<x-layout>
    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $log->name }}</h2>

    <div class="bg-gray-100 p-4 rounded shadow mb-4">
        <p><strong>Status:</strong> <span class="text-gray-700">{{ $log->status }}</span></p>
        <p><strong>Created By:</strong>
            <span class="text-gray-700">{{ $log->user->name ?? 'Unknown' }}</span>
            ({{ $log->user->email ?? 'N/A' }})
        </p>
        <p><strong>Created At:</strong>
            <span class="text-gray-700">{{ $log->created_at->format('M d, Y H:i') }}</span>
        </p>
    </div>

    {{-- Toggle Update Form --}}
    <button
        id="toggleUpdateBtn"
        type="button"
        class="btn"
    >
        Update Status
    </button>

    <div id="updateFormContainer" class="hidden bg-white p-4 rounded shadow mb-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Update Status</h3>

        <form action="{{ route('logs.update', $log->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label for="status" class="block font-semibold">Status:</label>
                <select
                    name="status"
                    id="status"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-red-500"
                    required
                >
                    <option value="In Progress" {{ $log->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Done" {{ $log->status === 'Done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <button type="submit" class="btn">
                Update Status
            </button>
        </form>
    </div>

    {{-- Remarks section --}}
    <h3 class="text-xl font-bold mt-6">Remarks</h3>
    <div class="space-y-2 mt-2">
        @foreach ($log->remarks as $remark)
            <div class="max-w-md p-2 ps-2 bg-gray-300 rounded shadow relative">
                <p class="text-gray-800">{{ $remark->remark }}</p>
                <div class="text-xs text-gray-500 text-right mt-1">
                    - {{ $remark->user->name ?? 'Unknown' }},
                    {{ $remark->created_at->format('M d, Y H:i') }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Toggle Button for Add Remark -->
    <button
        id="toggleRemarkFormBtn"
        class="btn my-3"
    >
        Add a Remark
    </button>

    <!-- Add Remark Form (initially hidden) -->
    <div id="remarkForm" class="mt-4 hidden">
        <h3 class="text-lg font-semibold mb-2">Add a Remark</h3>

        <form action="{{ route('logs.remarks.store', $log->id) }}" method="POST" class="space-y-2">
            @csrf

            <textarea name="remark" rows="3" class="w-full border rounded p-2" required></textarea>

            <button type="submit" class="btn">
                Add Remark
            </button>
        </form>
    </div>

    {{-- Actions history --}}
    <h3 class="text-xl font-bold mt-4">Actions</h3>
    <ul>
        @foreach ($log->actions as $action)
            <li class="my-2">
                <strong>{{ $action->created_at->format('M d, Y H:i') }}</strong>:
                {{ $action->action }} by
                <span class="text-blue-500 font-semibold">
                    {{ $action->user->name ?? 'Unknown User' }}
                </span>
            </li>
        @endforeach
    </ul>

    {{-- Delete Form --}}
    <form action="{{ route('logs.destroy', $log->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn">
            Delete Activity
        </button>
    </form>

    <!-- validation errors -->
    <x-errors />

    <script>
        document.getElementById('toggleUpdateBtn').addEventListener('click', function() {
            const formContainer = document.getElementById('updateFormContainer');
            formContainer.classList.toggle('hidden');
        });

        document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggleRemarkFormBtn');
        const remarkForm = document.getElementById('remarkForm');

        toggleBtn.addEventListener('click', function () {
            remarkForm.classList.toggle('hidden');
        });
    });
    </script>
</x-layout>
