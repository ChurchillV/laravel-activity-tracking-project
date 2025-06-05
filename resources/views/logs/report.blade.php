<x-layout>
    <h2 class="text-2xl font-bold mb-4">Activity Report</h2>

    <form method="GET" class="mb-4 flex gap-4 items-center">
        <div>
            <label for="start_date" class="block font-semibold">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{ $start_date }}" class="border rounded p-2">
        </div>

        <div>
            <label for="end_date" class="block font-semibold">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{ $end_date }}" class="border rounded p-2">
        </div>
        <div>
            <button type="submit" class="btn-info">Filter</button>
        </div>
    </form>

    @if($actions->isEmpty())
        <p>No actions found for the selected duration.</p>
    @else
        @foreach ($actions as $action)
            <x-activity
                :activityId='$action->activity_id'
                :activityName="$action->activity->name"
                :action="$action->action"
                :userName="$action->user->name ?? 'Unknown'"
                :timestamp="$action->created_at->format('H:i')"
            />
        @endforeach
    @endif
</x-layout>
