@extends("layouts.app")

@section("title", "The list of tasks")

{{-- This will be only displayed if the variable is set/passed/exists  --}}
{{-- @isset($name)
    <div>
        The name is: {{ $name }}
    </div>
@endisset --}}

@section("content")
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
            class="link">
            Add Task
        </a>
    </nav>

    {{-- @if(count($tasks)) --}}
    @forelse ( $tasks as $task )
        <div>
            <a href="{{ route("tasks.show", ["task" => $task->id]) }}"
                @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
    {{-- @endif --}}

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
