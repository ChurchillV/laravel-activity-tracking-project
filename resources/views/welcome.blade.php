<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Activity Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow px-4 py-3 flex justify-between items-center">
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
    </nav>

    <!-- Hero Section -->
    <header class="bg-green-100 py-12 text-center">
        <h1 class="text-4xl font-bold mb-2">Welcome to Activity Tracker</h1>
        <p class="text-gray-700 max-w-xl mx-auto">
            Effortlessly manage activities, track updates, and collaborate seamlessly.
        </p>
    </header>

    <!-- Features Section -->
    <section class="py-12 px-4 max-w-6xl mx-auto">
        <h2 class="text-2xl font-semibold text-center mb-8">Key Features</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                <h3 class="text-lg font-semibold mb-2">Activity Logs</h3>
                <p>Keep track of all activities and their status, created by team members.</p>
            </div>
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                <h3 class="text-lg font-semibold mb-2">Daily Updates</h3>
                <p>See who made updates each day and what changes were made.</p>
            </div>
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                <h3 class="text-lg font-semibold mb-2">Remarks & Collaboration</h3>
                <p>Add remarks to activities and collaborate effectively with your team.</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-green-200 py-12 text-center">
        @auth
            <a href="{{ route('logs.index') }}" class="bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">
                Go to Dashboard
            </a>
        @else
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 transition">
                    Register
                </a>
            </div>
        @endauth
    </section>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-gray-600 mt-12">
        &copy; {{ date('Y') }} Activity Tracker. All rights reserved.
    </footer>

</body>
</html>
