{{-- Layouts using Template Inheritance --}}

<!DOCTYPE html>
<html>

<head>
    <title>Laravel 12 Task List App</title>
    @yield('styles')
</head>

<body>
    <h1>@yield("title")</h1>
    <div>
        {{-- Flash message --}}
        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif

        @yield("content")
    </div>
</body>

</html>
