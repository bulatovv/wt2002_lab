<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/app.css') }}'>
    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title')</title>
</head>


<body>    
    @include('header')
    <main class="mx-2 mx-lg-auto">
        @yield('main')
    </main>
    @include('footer')
</body>


</html>
