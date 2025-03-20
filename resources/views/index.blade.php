@extends("layouts.app")

@section("title", "The list of tasks")

{{-- This will be only displayed if the variable is set/passed/exists  --}}
{{-- @isset($name)
    <div>
        The name is: {{ $name }}
    </div>
@endisset --}}

@section("content")
    {{-- @if(count($tasks)) --}}
    @forelse ( $tasks as $task )
        <div>
            <a href="{{ route("tasks.show", ["task" => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
    {{-- @endif --}}
@endsection
