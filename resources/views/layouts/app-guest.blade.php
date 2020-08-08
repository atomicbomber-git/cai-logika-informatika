<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield("title") </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
</head>
<body style="height: 100%">
<div id="app">
    <header>
        @include("layouts.navbar-guest")
    </header>

    <main
            class="container my-5 d-flex justify-content-center align-items-center">
        @yield("content")
    </main>
</div>
@yield("footer-script")
</body>
</html>
