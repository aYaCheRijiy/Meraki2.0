<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/main.js'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <title>Meraki</title>
</head>
<body class="body">

@include('layouts.header')
<div class="body_pages">
    @yield('content')
</div>
@include('layouts.footer')

</body>
</html>
