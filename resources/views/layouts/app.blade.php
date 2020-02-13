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
<body>
<div id="app">
    <header class="mb-4">
        @include('layouts.navbar')
    </header>

    <main class="container">
        <div class="row">
            @include("layouts.sidebar")

            <div class="col-md-9">
                @yield("content")
            </div>
        </div>
    </main>
</div>
@yield("footer-script")
</body>
</html>
