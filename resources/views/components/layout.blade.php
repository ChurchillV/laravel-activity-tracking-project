<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log Project</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    </head>

    <body>
        <x-toast />

        <header>
            <nav>
                <h1 class="ubuntu-bold">Log Project</h1>

                @guest
                    <a href="{{ route('show.login') }}" class="btn">Login</a>
                    <a href="{{ route('show.register') }}" class="btn">Register</a>
                @endguest

                @auth
                    <a href="{{ route('logs.index') }}">Activities</a>
                    <a href="{{ route('logs.create') }}" class="btn">Create</a>
                    <span class="border-r-2 pr-2">
                        Hello, {{ Auth::user()->name}}
                    </span>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn-critical">Logout</button>
                    </form>
                @endauth
            </nav>
        </header>

        <main class="container">
            {{ $slot }}
        </main>
    </body>
</html>
