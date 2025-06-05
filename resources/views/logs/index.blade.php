<x-layout>
    <h2 class="text-2xl font-bold mb-4">Ongoing Tasks</h2>

    <!-- Filter Dropdown -->
    <form method="GET" action="{{ route('logs.index') }}" class="mb-4 flex items-center space-x-2">
        <label for="status" class="font-semibold">Filter:</label>
        <select
            name="status"
            id="status"
            class="block w-full mt-2 mb-4 p-2 bg-white border border-gray-400 rounded-md"
            onchange="this.form.submit()"
        >
            <option value="">All</option>
            <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Done" {{ request('status') === 'Done' ? 'selected' : '' }}>Done</option>
        </select>
    </form>

    <ul>
        @forelse ($logs as $log)
            <li>
                <x-card
                    href="{{ route('logs.show', $log->id) }}"
                    :highlight_done="($log['status'] == 'Done')"
                    :highlight_pending="($log['status'] == 'Pending')"
                >
                    <div class="flex flex-col md:flex-row md:justify-between w-full gap-2 md:items-center">
                        <div>
                            <p>
                                <a href="{{ route('logs.show', $log) }}" class="font-semibold text-lg text-gray-800 hover:underline">
                                    {{ $log['name'] }}
                                </a>
                                <x-status
                                    :status_pending="($log['status'] == 'Pending')"
                                    :status_done="($log['status'] == 'Done')"
                                >
                                    {{ $log->status }}
                                </x-status>
                            </p>
                            <p class="text-sm text-gray-500">Created by {{ $log->user?->name ?? 'N/A' }}</p>
                        </div>

                        <!-- View details button: full width on mobile, aligned to right on larger screens -->
                        {{-- <div class="mt-2 md:mt-0">
                            <a href="{{ route('logs.show', $log->id) }}" class="btn w-full md:w-auto text-center">
                                View details
                            </a>
                        </div> --}}
                    </div>
                </x-card>
            </li>

        @empty
            <p>No logs found for the selected status.</p>
        @endforelse
    </ul>

    {{ $logs->links() }}
</x-layout>
