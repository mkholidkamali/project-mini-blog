<!doctype html>
<html lang="en">

<head>
    @include('layouts.partials.header')
</head>

<body>

    <header>
        @include('layouts.partials.navbar')
    </header>

    <main> 
        @yield('main')
    </main>

    <footer class="text-muted py-5">
        @include('layouts.partials.footer')
    </footer>

    @include('layouts.partials.scripts')
</body>
</html>
