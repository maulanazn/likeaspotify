<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        @extends('component.navbar-artist')
        
        <main class="container mt-3">
            @yield('content')
        </main>
        
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>
