<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MyLink</title>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="font-sans text-gray-900 antialiased auth-layout">
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
            <svg width="147" height="37" viewBox="0 0 147 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.0351 5.10998L12.8101 6.54498L12.5651 5.00498L3.22012 6.50998V27.72H0.000117265V3.98998L13.5801 1.92498L13.8251 3.49998L23.9051 1.71498L27.2301 27.125L23.8351 27.65L21.0351 5.10998ZM11.5151 8.78498H14.7351V27.72L11.4801 27.755L11.5151 8.78498ZM50.7181 8.78498L53.5881 9.97498L41.6181 36.505L38.7481 35.385L50.7181 8.78498ZM35.2131 10.08L38.0831 8.81998L44.0331 22.68L41.1981 24.01L35.2131 10.08ZM63.0247 1.92498H66.2097L66.8047 24.5L82.3797 23.38L82.5197 26.355L63.6897 27.685L63.0247 1.92498ZM91.3868 1.81998H95.4468V5.87998H91.3868V1.81998ZM91.8768 9.06498H94.9218V27.65H91.8768V9.06498ZM116.545 12.355L111.33 13.335L110.7 10.325L119.065 8.74998L121.865 27.265L118.75 27.755L116.545 12.355ZM106.43 8.88998L109.475 8.78498L110.14 27.65L107.095 27.755L106.43 8.88998ZM135.094 27.545L132.049 27.65L131.384 0.104977L134.429 -2.38419e-05L134.849 17.85L142.689 8.67998L144.929 10.78L138.559 17.85L146.644 25.48L144.404 27.755L134.884 18.2L135.094 27.545Z" fill="#4C4C4C"/>
            </svg>

        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
</body>
</html>
