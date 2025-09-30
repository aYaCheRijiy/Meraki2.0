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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a class="logoAndTextOnAuth" href="{{ route('main.index') }}" wire:navigate>
                    <svg width="113" height="113" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="6.34033" width="106.087" height="106.085" fill="white"/>
                        <rect x="0.5" y="6.34033" width="106.087" height="106.085" stroke="black"/>
                        <rect x="0.5" y="6.34033" width="106.087" height="106.085" stroke="black"/>
                        <rect x="0.5" y="6.34033" width="106.087" height="106.085" stroke="black"/>
                        <rect x="3.4209" y="3.42041" width="106.087" height="106.085" fill="white"/>
                        <rect x="3.4209" y="3.42041" width="106.087" height="106.085" stroke="black"/>
                        <rect x="3.4209" y="3.42041" width="106.087" height="106.085" stroke="black"/>
                        <rect x="3.4209" y="3.42041" width="106.087" height="106.085" stroke="black"/>
                        <rect x="6.33887" y="0.5" width="106.087" height="106.085" fill="white"/>
                        <rect x="6.33887" y="0.5" width="106.087" height="106.085" stroke="black"/>
                        <rect x="6.33887" y="0.5" width="106.087" height="106.085" stroke="black"/>
                        <rect x="6.33887" y="0.5" width="106.087" height="106.085" stroke="black"/>
                        <rect x="46.4385" y="59.7808" width="23.8372" height="37.4654" fill="#D0FFCA" stroke="black" stroke-width="0.5"/>
                        <rect x="14.6201" y="59.7808" width="23.8372" height="37.4654" fill="#FFF7CA" stroke="black" stroke-width="0.5"/>
                        <rect x="78.2568" y="9.4873" width="23.8372" height="37.4654" fill="#FFCACA" stroke="black" stroke-width="0.5"/>
                        <rect x="46.4385" y="9.4873" width="23.8372" height="37.4654" fill="#CAFFFF" stroke="black" stroke-width="0.5"/>
                        <rect x="14.6191" y="9.4873" width="23.8372" height="37.4654" fill="#CAD1FF" stroke="black" stroke-width="0.5"/>
                    </svg>
                    <svg width="178" height="30" viewBox="0 0 178 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.96 29.35L4.53 2.26V26.865L7.89 28.265V29H0.4V28.265L3.69 26.865V2.26L0.47 1.77V1H8.205L16.99 23.47L25.95 1H33.02V1.77L29.8 2.26V27.74L33.02 28.265V29H22.73V28.265L25.95 27.74V3.31L15.59 29.35H14.96ZM41.7602 29V28.265L44.9802 27.74V2.26L41.7602 1.77V1H62.8302V9.015H61.8852L59.1902 1.875H48.8302V14.475H53.3802L55.4452 9.4H56.3552V20.46H55.4452L53.3452 15.315H48.8302V28.16H59.8202L62.6902 20.46H63.6002V29H41.7602ZM93.2698 29.35C91.9631 29.35 90.9831 29.035 90.3298 28.405C89.6764 27.775 89.2331 26.7017 88.9998 25.185L88.3348 20.495C88.1014 18.9083 87.5531 17.6717 86.6898 16.785C85.8498 15.875 84.5314 15.42 82.7348 15.42H80.0048V27.74L83.2248 28.265V29H72.9348V28.265L76.1548 27.74V2.26L72.9348 1.77V1H82.7348C86.5381 1 89.2914 1.595 90.9948 2.785C92.6981 3.975 93.5498 5.78333 93.5498 8.21C93.5498 12.2233 91.1231 14.545 86.2698 15.175V15.385C88.0664 15.6417 89.5014 16.2833 90.5748 17.31C91.6714 18.3367 92.3598 19.7017 92.6398 21.405L93.0948 24.415C93.2814 25.7217 93.4914 26.6083 93.7248 27.075C93.9814 27.5417 94.3664 27.775 94.8798 27.775C95.2298 27.775 95.6031 27.67 95.9998 27.46C96.3964 27.2267 96.7698 26.935 97.1198 26.585L97.7148 27.215C97.0381 27.985 96.3381 28.5333 95.6148 28.86C94.8914 29.1867 94.1098 29.35 93.2698 29.35ZM83.9248 14.58C85.6281 14.58 86.9464 14.0667 87.8798 13.04C88.8364 11.99 89.3148 10.45 89.3148 8.42V7.685C89.3148 3.81167 87.1214 1.875 82.7348 1.875H80.0048V14.58H83.9248ZM101.934 29V28.265L105.364 26.865L115.479 0.299998H116.039L125.594 27.74L128.814 28.265V29H118.524V28.265L121.394 27.81L118.419 19.515H109.109L106.274 26.865L109.424 28.265V29H101.934ZM109.389 18.78H118.174L113.974 6.46L109.389 18.78ZM135.421 29V28.265L138.641 27.74V2.26L135.421 1.77V1H145.711V1.77L142.491 2.26V14.86L153.866 3.24L150.051 1.77V1H158.136V1.77L155.266 3.24L147.321 11.22L158.521 27.74L160.901 28.265V29H150.576V28.265L153.761 27.775L144.591 13.95L142.491 16.085V27.74L145.711 28.265V29H135.421ZM167.211 29V28.265L170.431 27.74V2.26L167.211 1.77V1H177.501V1.77L174.281 2.26V27.74L177.501 28.265V29H167.211Z" fill="#4C4C4C"/>
                    </svg>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
