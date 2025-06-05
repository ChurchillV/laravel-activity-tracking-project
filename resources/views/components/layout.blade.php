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

        <header class="bg-white shadow">
        <nav class="container mx-auto flex items-center justify-between flex-wrap p-4">
            <div class="flex items-center flex-shrink-0 text-green-600 mr-6">
                <h1 class="text-xl font-bold ubuntu-bold">
                    <a href="{{ route('landing') }}">
                        Activity Tracker
                    </a>
                </h1>
            </div>

            <!-- Mobile menu button -->
            <div class="block md:hidden">
                <button id="menu-toggle" class="flex items-center px-3 py-2 border rounded text-green-600 border-green-600 hover:text-green-800 hover:border-green-800">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"/>
                    </svg>
                </button>
            </div>

            <!-- Menu items -->
            <div id="menu" class="w-full flex-grow md:flex md:items-center md:w-auto hidden">
                <div class="text-sm md:flex-grow">
                    @guest
                        <a href="{{ route('show.login') }}" class="block mt-2 md:inline-block md:mt-0 text-green-600 hover:text-green-800 mr-4">
                            Login
                        </a>
                        <a href="{{ route('show.register') }}" class="block mt-2 md:inline-block md:mt-0 text-green-600 hover:text-green-800 mr-4">
                            Register
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('logs.index') }}" class="block mt-2 md:inline-block md:mt-0 text-green-600 hover:text-green-800 mr-4">
                            All Activities
                        </a>
                        <a href="{{ route('logs.daily') }}" class="block mt-2 md:inline-block md:mt-0 text-green-600 hover:text-green-800 mr-4">
                            Daily Updates
                        </a>
                        <a href="{{ route('logs.report') }}" class="block mt-2 md:inline-block md:mt-0 text-green-600 hover:text-green-800 mr-4">
                            Reports
                        </a>
                        <a href="{{ route('logs.create') }}" class="block mt-2 md:inline-block md:mt-0 bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-4">
                            Create
                        </a>
                        <form action="{{ route('logout') }}" method="post" class="inline-block">
                            @csrf
                            <button class="block mt-2 md:inline-block md:mt-0 bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 mr-4">
                                Logout
                            </button>
                        </form>
                        <span class="inline-block rounded-full bg-green-100 text-green-600 px-2 text-center font-bold">
                            {{ substr(Auth::user()->name, 0, 1)}}
                        </span>
                    @endauth
                    </div>
                </div>
            </nav>
        </header>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('hidden');
    });
</script>

        <main class="container">
            {{ $slot }}
        </main>
    </body>
</html>
