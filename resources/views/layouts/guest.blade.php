<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="logo">
                            <img src="{{Vite::asset('public\code-school-logo_5f3eb01d9eefd.png')}}">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/') }}">{{ __('Home Utente') }}</a>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')
    </body>
</html>
