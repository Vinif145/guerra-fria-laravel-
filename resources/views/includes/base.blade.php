<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}"></script> -->

    <!-- Fonts -->
    

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    
    <!-- Bootstrap Section -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- espaço para adicionar mais css -->       
    @yield('head')

    
  </head>
  <body>   
    
    @yield('nav')    
    @yield('header')    
    @yield('content')
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    @yield('javascript')

    @yield('footer')
  </body>
</html>