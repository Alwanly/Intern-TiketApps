<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body class="">
<div id="app" >
    <header>
        @include('layouts.topnavUser')
    </header>

    <main class="wrapper-content py-4">
        @yield('content')
    </main>

    <footer class="bottom-0">
        @include('layouts.footer')
    </footer>

</div>

<script src="/js/app.js"></script>
<script src="/js/menu.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<!-- jQuery, Popper and Bootstrap JS -->
<!-- Scripts -->

@stack('js')
</body>
</html>
