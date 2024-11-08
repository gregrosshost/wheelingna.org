<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @stack('htmlHead')
        @livewireStyles
        @filamentStyles
        <script>
            if (localStorage.getItem('darkMode') === 'true' ||
                (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">

        <!-- Nav -->
        <x-site.wrapper class="border-b border-primary bg-secondary dark:border-dark-primary dark:bg-dark-secondary">
            <x-site.inner-container>
                <x-site.nav />
            </x-site.inner-container>
        </x-site.wrapper>

        <!-- Banner -->
        <x-site.wrapper class="">
            {{ $banner ?? '' }}
        </x-site.wrapper>


        <!-- Main -->
        <x-site.wrapper class="bg-secondary dark:bg-dark-secondary">
            <x-site.inner-container>
                {{ $slot }}
            </x-site.inner-container>
        </x-site.wrapper>

        <!-- Footer -->
        <x-site.wrapper class="border-t border-primary bg-primary dark:border-dark-primary dark:bg-dark-primary">
            <x-site.inner-container>
                <x-site.footer />
            </x-site.inner-container>
        </x-site.wrapper>

        @livewireScripts
        @filamentScripts
    </body>
</html>
