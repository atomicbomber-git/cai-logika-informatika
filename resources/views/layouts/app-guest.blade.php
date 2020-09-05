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


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">

    <style>
        body {
            font-family: 'Kufam', serif
        }
    </style>
</head>
<body style="height: 100%">
<div id="app">
    <header>
        @include("layouts.navbar-guest")
    </header>

    <main
            style="
                    height: 1400px;
                    background-image: url('{{ asset("images/home.jpg") }}');
                    "
            class="p-5"
    >
        <div style="filter: grayscale(0%)" class="container d-flex justify-content-center align-items-center flex-wrap">
            @yield("content")
        </div>

    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield("footer-script")
</body>
</html>
