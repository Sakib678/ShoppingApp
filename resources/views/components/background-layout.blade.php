<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
     <title>Laravel</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
</header>
        <section>
            <p>MAIN CONTENT</p>
        </section>
        <footer>
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </footer>
    </body>
</html>