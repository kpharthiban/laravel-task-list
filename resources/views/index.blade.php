<div>
    Hello, I am a Blade Template!
</div>

{{-- This will be only displayed if the variable is set/passed/exists  --}}
@isset($name)
    <div>
        The name is: {{ $name }}
    </div>
@endisset
