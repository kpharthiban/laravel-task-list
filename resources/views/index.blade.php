<div>
    Hello, I am a Blade Template!
</div>

{{-- This will be only displayed if the variable is set/passed/exists  --}}
{{-- @isset($name)
    <div>
        The name is: {{ $name }}
    </div>
@endisset --}}

<div>
    {{-- @if(count($tasks)) --}}
    @forelse ( $tasks as $task )
        <div>
            <a href="{{ route("tasks.show", ["id" => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
    {{-- @endif --}}
</div>
