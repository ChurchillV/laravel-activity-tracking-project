<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Activity Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />

    <!-- Sticky footer layout wrapper -->
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>

</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    {{-- <nav class="bg-white shadow px-4 py-3 flex justify-between items-center">
        <div class="text-xl font-bold text-green-600">
            <a href="{{ route('landing') }}">
                Activity Tracker
            </a>
        </div>
        <div class="space-x-4">
            @auth
                <a href="{{ route('logs.index') }}" class="text-green-600 font-semibold hover:underline">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-600 font-semibold hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-green-600 font-semibold hover:underline">Register</a>
            @endauth
        </div>
    </nav> --}}

    <nav class="max-w-screen-lg px-4 md:px-12 py-4 mx-auto flex items-center justify-between flex-wrap">
        <div class="flex items-center flex-shrink-0 text-green-600 mr-6">
            <h1 class="text-xl font-bold ubuntu-bold">
                <a href="{{ route('landing') }}">
                Activity Tracker
                </a>
            </h1>
            </div>

            <!-- Mobile menu button -->
            <div class="block md:hidden">
            <button id="menu-toggle" class="flex items-center px-3 py-2 border rounded text-green-600 border-green-600 hover:text-white hover:border-green-800">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20">
                <title>Menu</title>
                <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"/>
                </svg>
            </button>
            </div>

            <!-- Menu items -->
            <div id="menu" class="w-full flex-grow md:flex md:items-center md:justify-end md:w-auto hidden mt-4 md:mt-0 space-y-2 md:space-y-0 md:space-x-4">
                <div class="space-x-4">
                    @auth
                        <a href="{{ route('logs.index') }}" class="text-green-600 font-semibold hover:underline">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 font-semibold hover:underline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:underline">Login</a>
                        <a href="{{ route('register') }}" class="text-green-600 font-semibold hover:underline">Register</a>
                </div>
            @endauth
        </div>
    </nav>




    <main>
        <!-- Hero Section -->
        <header class="bg-green-100 py-16 text-center flex flex-col justify-center items-center min-h-[60vh]">
            <h1 class="text-4xl md:text-5xl font-extrabold text-green-700 mb-4">Welcome to Activity Tracker</h1>
            <p class="text-gray-700 max-w-2xl text-lg md:text-xl mx-auto">
                Effortlessly manage activities, track updates, and collaborate seamlessly.
            </p>
        </header>

        <!-- Features Section -->
        <section class="py-12 px-4 max-w-6xl h-max mx-auto">
            <h2 class="text-2xl font-semibold text-center mb-8">Key Features</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Activity Logs</h3>
                    <p>Keep track of all activities and their status, created by team members.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Daily Updates</h3>
                    <p>See who made updates each day and what changes were made.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold mb-2">Remarks & Collaboration</h3>
                    <p>Add remarks to activities and collaborate effectively with your team.</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="bg-green-200 py-12 text-center">
            @auth
                <a href="{{ route('logs.index') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">
                    Go to Dashboard
                </a>
            @else
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="inline-block bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 transition">
                        Register
                    </a>
                </div>
            @endauth
        </section>

        <!-- Footer -->
        <footer class="bg-white py-4 text-center text-gray-600 mt-auto">
            &copy; {{ date('Y') }} Activity Tracker. All rights reserved.
        </footer>
    </main>


    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
