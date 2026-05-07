<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Reptile Bio') }}@hasSection('title') — @yield('title')@endif</title>
        @stack('meta')

        <link rel="icon" type="image/png" href="{{ asset('patreon-reptile-bio.png') }}">
        <meta name="theme-color" content="#2563eb">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preload" href="https://fonts.bunny.net/css?family=inter:400,500,600,700|merriweather:400,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,500,600,700|merriweather:400,700&display=swap"></noscript>

        <!-- Scripts -->
        @production
            <link rel="preload" href="{{ Vite::asset('resources/css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}"></noscript>
            @vite('resources/js/app.js')
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endproduction
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
            @auth
                @include('layouts.navigation')
            @else
                <x-guest-navigation />
            @endauth

            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="flex-1">
                {{ $slot }}
            </main>

            <x-site-footer />
        </div>
        @stack('scripts')
    </body>
</html>
