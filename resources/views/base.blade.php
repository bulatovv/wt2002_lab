<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/app.css') }}'>
    <script src="{{ asset('js/app.js') }}"></script>

    <title>@yield('title')</title>
</head>


<body class="m-auto">    
    @include('header')
    <main class="mx-lg-auto mb-5">
        @yield('main')
    </main>
    @include('footer')

    @if(session('show_modal'))
        @include('item_modal', ['item' => session('show_modal')])
        <script>
            var element = $("#modal{{ session('show_modal')->id }}");
            var modal = new bootstrap.Modal(element);
            modal.show();
        </script>
    @endif
</body>


</html>
