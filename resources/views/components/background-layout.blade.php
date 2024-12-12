<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Laravel</title>
    <script src="{{ asset('js/my.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('components.menu-bar') 

    <section>
        {{ $slot }}
    </section>
    <footer>
        <p>Made by Sakib Arif c3606024 Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </footer>
</body>
</html>
