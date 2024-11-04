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
                            <svg
                                class="h-16 w-auto text-primary dark:text-dark-primary"
                                viewBox="0 0 144.89998 144.89998"
                                fill="currentColor">
                                <g transform="matrix(1.25,0,0,-1.25,0,144.89997)">
                                    <path d="m 101.24414,12.42383 c 0,-0.51953 0.0977,-1.00781 0.29492,-1.46778 0.19532,-0.45214 0.46094,-0.84667 0.79688,-1.18359 0.3457,-0.33594 0.74414,-0.60058 1.19531,-0.78808 0.45898,-0.18848 0.94922,-0.28223 1.46777,-0.28223 0.51856,0 1.00489,0.09375 1.45606,0.28223 0.45898,0.1875 0.85742,0.45214 1.19531,0.78808 0.34375,0.33692 0.61328,0.73145 0.80859,1.18359 0.19727,0.45997 0.29493,0.94825 0.29493,1.46778 0,0.51953 -0.0977,1.00586 -0.29493,1.45508 -0.19531,0.45996 -0.46484,0.85839 -0.80859,1.19629 -0.33789,0.34472 -0.73633,0.61328 -1.19531,0.80859 -0.45117,0.19824 -0.9375,0.29492 -1.45606,0.29492 -0.51855,0 -1.00879,-0.09668 -1.46777,-0.29492 -0.45117,-0.19531 -0.84961,-0.46387 -1.19531,-0.80859 -0.33594,-0.3379 -0.60156,-0.73633 -0.79688,-1.19629 -0.19726,-0.44922 -0.29492,-0.93555 -0.29492,-1.45508 z m 1.29688,0 c 0,0.87109 0.21386,1.5293 0.64648,1.97558 0.43164,0.44239 1.03516,0.667 1.81152,0.667 0.77539,0 1.37989,-0.22461 1.81153,-0.667 0.43261,-0.44628 0.64746,-1.10449 0.64746,-1.97558 0,-0.86914 -0.21485,-1.52735 -0.64746,-1.97168 -0.43164,-0.44727 -1.03614,-0.66797 -1.81153,-0.66797 -0.77636,0 -1.37988,0.2207 -1.81152,0.66797 -0.43262,0.44433 -0.64648,1.10254 -0.64648,1.97168 z m 1.03125,2.04492 0,-3.82715 0.93066,0 0,1.44727 0.32422,0 0.80957,-1.44727 1.03125,0 -0.85938,1.54785 c 0.0801,0.0078 0.16602,0.03223 0.25293,0.07422 0.0869,0.03809 0.16895,0.09961 0.24317,0.17969 0.0742,0.08203 0.13476,0.18555 0.18261,0.31445 0.0537,0.12989 0.0801,0.28223 0.0801,0.46582 0,0.47852 -0.15722,0.80371 -0.46582,0.9795 -0.30273,0.17675 -0.72461,0.26562 -1.26562,0.26562 l -1.26367,0 z m 1.42675,-1.62988 -0.49609,0 0,0.88086 0.49609,0 c 0.18262,0 0.3252,-0.03809 0.42481,-0.11231 0.10156,-0.0664 0.15137,-0.1709 0.15137,-0.3125 0,-0.15722 -0.0498,-0.26855 -0.15137,-0.34472 -0.0996,-0.07422 -0.24219,-0.11133 -0.42481,-0.11133 z"/>

                                    <path d="m 30.13379,93.20996 17.16309,-34.79297 0,34.02442 9.99414,0 0,-30.05078 5.96875,0 0,39.45214 c 21.59375,-2.8125 38.27148,-21.27832 38.27148,-43.63672 0,-10.55761 -3.71973,-20.27343 -9.91602,-27.85742 l -14.36523,0 c 7.43164,5.27735 12.6582,13.4834 14.02539,22.91114 l -18.15039,0 0,-22.91114 -9.86523,0 0,22.91114 -5.96875,0 0,-36.62012 -29.08545,59.62598 C 24.23633,69 23.41113,63.96875 23.41113,58.20605 c 0,-11.48632 5.67871,-21.67675 14.3833,-27.85742 l -13.98486,0 c -6.27783,7.6084 -10.29639,17.22266 -10.29639,27.85742 0,13.68458 5.58155,26.0254 16.62061,35.00391 z M 73.125,62.39063 91.37891,62.39063 C 89.98047,73.81348 82.9375,83.48926 73.125,88.54785 l 0,-26.15722 z"/>

                                    <path class="stroke-primary dark:stroke-dark-primary" d="m 3.44336,58.39941 c 0,29.86524 24.2124,54.07813 54.07812,54.07813 29.86719,0 54.07813,-24.21289 54.07813,-54.07813 0,-29.86621 -24.21094,-54.0791 -54.07813,-54.0791 -29.86572,0 -54.07812,24.21289 -54.07812,54.0791 z" style="fill:none;stroke-width:0.95731002;stroke-miterlimit:4;stroke-dasharray:none"/>

                                    <path class="stroke-primary dark:stroke-dark-primary" d="m 8.41357,58.39941 c 0,27.1211 21.98633,49.10743 49.10791,49.10743 27.12207,0 49.10938,-21.98633 49.10938,-49.10743 0,-27.12207 -21.98731,-49.10839 -49.10938,-49.10839 -27.12158,0 -49.10791,21.98632 -49.10791,49.10839 z" style="fill:none;stroke-width:1.01859999;stroke-miterlimit:4;stroke-dasharray:none"/>
                                </g>
                            </svg>
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
        <footer class="border-t border-primary dark:border-dark-primary bg-primary dark:bg-dark-primary">
            <!-- Inner Container -->
            <div class="mx-auto max-w-7xl px-4 py-6 text-secondary dark:text-dark-secondary sm:px-6 lg:px-8">
                <div class="text-center">
                    <div class="mb-2">
                        <h4 class="font-semibold text-secondary/90 dark:text-dark-secondary/90">Helpline Phone Number</h4>
                        <a href="tel:8882512426" class="text-xl font-bold hover:text-2xl transition-all duration-200 hover:text-secondary dark:hover:text-dark-secondary">
                            (888) 251-2426
                        </a>
                    </div>
                    <address class="not-italic text-secondary/80 dark:text-dark-secondary/80">
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
