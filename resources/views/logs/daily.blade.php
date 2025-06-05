<x-layout>
    <h2 class="text-2xl font-bold mb-4">Daily Activity Updates</h2>

    @forelse ($actionsGroupedByDate as $date => $actions)
        <h3 class="text-xl font-semibold mt-6">{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</h3>

        @foreach ($actions as $action)
            <x-activity
                :activityId='$action->activity_id'
                :activityName="$action->activity->name"
                :action="$action->action"
                :userName="$action->user->name ?? 'Unknown'"
                :timestamp="$action->created_at->format('H:i')"
            />
        @endforeach
    @empty
        <p class="text-gray-600">No activity updates found.</p>
    @endforelse
</x-layout>
