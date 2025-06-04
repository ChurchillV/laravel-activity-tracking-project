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
        @if(session('success'))
            <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
                {{ session('success')}}
            </div>

            <script>
                setTimeout(function() {
                    const flash = document.getElementById('flash');
                    if (flash) {
                        flash.style.display = 'none';
                    }
                }, 3000);
            </script>

        @endif

        <header>
            <nav>
                <h1 class="ubuntu-bold">Log Project</h1>
                <a href="{{ route('logs.index') }}">All Logs</a>
                <a href="{{ route('logs.create') }}">Create Log</a>

                <a href="{{ route('show.login') }}" class="btn">Login</a>
                <a href="{{ route('show.register') }}" class="btn">Register</a>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn">Logout</button>
                </form>
            </nav>
        </header>

        <main class="container">
            {{ $slot }}
        </main>
    </body>
</html>
