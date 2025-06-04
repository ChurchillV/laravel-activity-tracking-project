<x-layout>
    <h2>Ongoing Tasks</h2>
        <ul>
            @foreach ($logs as $log)
                <li>
                   <x-card
                        href="{{ route('logs.show', $log->id) }}"
                        :highlight_todo="($log['status'] == 'To do')"
                        :highlight_in_progress="($log['status'] == 'In Progress')"
                        :highlight_done="($log['status'] == 'Done')"
                    >
                    <div>
                        <p>
                            <span class="title">{{ $log['title']}}</span>
                            <x-status
                                :status_todo="($log['status'] == 'To do')"
                                :status_in_progress="($log['status'] == 'In Progress')"
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
