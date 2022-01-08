<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Administrador</title>
    <link rel="icon" type="image/png" href="{{ mix('assets/admin/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ mix('assets/admin/css/app.css') }}" rel="stylesheet">
    @stack('links')
</head>

<body class="antialiased">
    <div id="app">
        <vue-js />
    </div>
    <div id="scripts">
        <script defer src="{{ mix('assets/admin/js/vendor.js') }}"></script>
        <script defer src="{{ mix('assets/admin/js/manifest.js') }}"></script>
        <script defer src="{{ mix('assets/admin/js/app.js') }}"></script>
        @stack('scripts')
    </div>
</body>

</html>
