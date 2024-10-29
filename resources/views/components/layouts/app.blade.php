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
        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased">

        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-center h-24">
                    <div class="flex items-center gap-4">
                        <img
                            src="{{ Vite::asset('resources/assets/na-logo.webp') }}"
                            alt="NA Logo"
                            class="h-16 w-auto"
                        />
                        <h1 class="text-2xl font-bold text-gray-900">Wheeling Area Service Committee of Narcotics Anonymous</h1>
                    </div>
                </div>
            </div>
        </nav>


                    {{ $slot }}





        <!-- Footer -->
        <footer class="bg-green-300 border-t border-gray-200">
            <!-- Inner Container -->
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <div class="mb-2">
                        <h4 class="font-semibold text-gray-900">Helpline Phone Number</h4>
                        <a href="tel:8882512426" class="text-xl font-bold text-red-600 hover:text-red-800">
                            (888) 251-2426
                        </a>
                    </div>
                    <address class="text-gray-600 not-italic">
                        WASCNA, P.O. Box 6837<br>
                        Wheeling, WV 26003
                    </address>
                </div>
            </div>
        </footer>


        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
