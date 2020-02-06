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

    <!-- Fonts -->
    <link rel="dns-prefetch"
          href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito"
          rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
</head>
<body>
<div id="app">
    <header class="w-full bg-gray-700">
        <nav class="flex justify-between container max-w-5xl mx-auto text-white">
            <div class="py-6">
                <span class="font-bold tracking-wide">
                    {{ config("app.name") }}
                </span>
            </div>
        </nav>
    </header>

    <main class="container flex max-w-5xl mx-auto mt-5">
        <nav class="px-10 bg-gray-100 py-5">
            <h5 class="text-blue-700 uppercase tracking-wide font-bold">
                Manajemen Data
            </h5>

            <ul class="pt-2 pl-2">
                <li>
                    <a
                            class="block bg-gray-100 px-2 py-2 hover:bg-gray-300 text-gray-800 hover:text-gray-600"
                            href="{{ route("materi.index") }}">
                        <i class="fas fa-list-alt"></i>
                        Materi
                    </a>
                </li>
                <li>
                    <a
                            class="block bg-gray-100 px-2 py-2 hover:bg-gray-300 text-gray-800 hover:text-gray-600"
                            href="">
                        <i class="fas fa-list-alt"></i>
                        Permasalahan
                    </a>
                </li>
            </ul>

            <div>
            </div>
        </nav>

        <div class="flex-1 py-5 px-5">
            @yield("content")
        </div>
    </main>
</div>
</body>
</html>
