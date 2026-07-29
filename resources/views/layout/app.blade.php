<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    @yield('head')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body  class="bg-gray-100 min-h-screen grid">
    @yield('hero')
    <section>
        @yield('content')
    </section>

    @yield('scripts')
</body>
</html>
