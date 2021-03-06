@extends('layouts.base')

@section('head')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet"><!--Header -->
@endsection

@section('nav')
<nav class="navbar navbar-expand-lg navbar-dark triade" >
        <div class="container-fluid">
            <div id="header2">
              <a class="navbar-brand" href="{{route('home')}}" id="logo">
              
                <strong>Guerra Fria</strong> <span>2.0</span>
             
              </a>
          </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-adjustment " id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('pages')}}">Páginas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('posts')}}">Posts</a>
                </li>
              </ul>
            </div>
        </div>
     </nav>
@endsection

@section('javascript')
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<script> 
      $(document).ready( () => {     
      var menu1 = $(".menu_show");
      $(document).scroll( function() {
          var scroll = $(document).scrollTop();
          if(scroll > 40 )  $(".menu_show").fadeIn();
          if(scroll <= 30 ) $(".menu_show").fadeOut();
      });       
      });
</script>
@endsection