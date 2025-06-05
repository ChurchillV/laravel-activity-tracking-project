<x-layout>
    <h2>Ongoing Tasks</h2>
        <ul>
            @foreach ($logs as $log)
                <li>
                   <x-card
                        href="{{ route('logs.show', $log->id) }}"
                        :highlight_done="($log['status'] == 'Done')"
                        :highlight_pending="($log['status'] == 'Pending')"
                    >
                    <div>
                        <p>
                            <span class="title">{{ $log['name']}}</span>
                            <x-status
                                :status_pending="($log['status'] == 'Pending')"
                                :status_done="($log['status'] == 'Done')"
                            >
                                {{$log->status}}
                            </x-status>
                        </p>
                        <p class="subtext">Created by {{ $log->user?->name ?? 'N/A' }}</p>
                    </div>

                   </x-card>
                </li>
            @endforeach
        </ul>

        {{ $logs->links() }}
</x-layout>
