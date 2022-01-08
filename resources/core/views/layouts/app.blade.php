<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}A</title>
    <link rel="icon" type="image/png" href="{{ mix('assets/core/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ mix('assets/core/css/app.css') }}" rel="stylesheet">
    @stack('links')
</head>

<body class="preload antialiased">
    <div id="app">
        <main class="flex justify-center">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <div id="scripts">
            <script defer src="{{ mix('assets/core/js/manifest.js') }}"></script>
            <script defer src="{{ mix('assets/core/js/app.js') }}"></script>
            @stack('scripts')
        </div>
    </div>
</body>

</html>
