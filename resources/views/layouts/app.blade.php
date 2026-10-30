<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen text-slate-800 flex flex-col justify-between">

    <nav class="bg-sky-500 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            <div class="flex items-center space-x-6">
                <span class="font-bold text-xl tracking-tight text-white">Barangay Bakuna Tracker</span>
                @auth
                    <a href="/dashboard" class="text-sky-100 hover:text-white text-sm font-medium transition-colors">Dashboard</a>
                    <a href="/schedule" class="text-sky-100 hover:text-white text-sm font-medium transition-colors">Schedule</a>
                @endauth
            </div>
            <div>
                @auth
                    <span class="mr-4 text-sm font-medium text-white">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-3 py-1.5 rounded text-xs font-semibold shadow-sm transition-colors">
                            Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-semibold underline hover:text-sky-100">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full flex-grow">
        @yield('content')
    </main>

    <footer class="bg-slate-200 text-slate-600 text-center py-4 text-xs border-t border-slate-300">
        © 2026 Barangay Health Center
    </footer>

</body>
</html>