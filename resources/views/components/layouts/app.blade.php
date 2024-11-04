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
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            if (localStorage.getItem('darkMode') === 'true' ||
                (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        </script>
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased">


        <nav class="border-b border-primary bg-secondary dark:border-dark-primary dark:bg-dark-secondary">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-20 items-center justify-between md:h-24">
                    <a href="/" >
                        <div class="flex items-center gap-4">
                            <img
                                src="{{ Vite::asset('resources/assets/na-logo.webp') }}"
                                alt="NA Logo"
                                class="h-16 w-auto"
                            />
                            <h1 class="text-lg font-bold text-primary dark:text-dark-primary md:text-2xl">
                                Wheeling Area Service Committee of Narcotics Anonymous
                            </h1>
                        </div>
                    </a>
                    <div class="flex items-center justify-end ml-4">
                        <x-theme-switcher />
                    </div>
                </div>
            </div>
        </nav>


                    {{ $slot }}





        <!-- Footer -->
        <footer class="border-t border-gray-200 bg-primary">
            <!-- Inner Container -->
            <div class="mx-auto max-w-7xl px-4 py-6 text-secondary sm:px-6 lg:px-8">
                <div class="text-center">
                    <div class="mb-2">
                        <h4 class="font-semibold text-secondary/90">Helpline Phone Number</h4>
                        <a href="tel:8882512426" class="text-xl font-bold hover:text-2xl">
                            (888) 251-2426
                        </a>
                    </div>
                    <address class="not-italic text-secondary">
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
