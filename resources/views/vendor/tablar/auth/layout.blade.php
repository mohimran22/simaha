<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <title>@yield('title')</title>

    <!-- CSS/JS files -->
    @if(config('tablar','vite'))
        @vite('resources/js/app.js')
    @endif
  
    {{-- Custom Stylesheets (post Tablar) --}}
    @yield('tablar_css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>
<body class=" border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    @yield('content')
</div>

@yield('tablar_js')

</html>
