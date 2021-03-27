@extends('layouts.base')

@section('head')

      <meta charset="utf-8">
      <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
      <!--  All snippets are MIT license http://bootdey.com/license -->
      <title>Index</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
    
      <!-- JavaScript Bundle with Popper -->
      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
      <link href="{{ asset('css/estilo2.css') }}" rel="stylesheet"><!--Nossa própria folha de estilo -->

@endsection

@section('nav')
      <nav class="navbar navbar-expand-lg navbar-dark menu_show fixed-top" style="background-color: #001928;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Guerra Fria 2.0</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
     
@section('header')
       <div id="header">
				<img src="{{asset('img/RainhaHeader.webp')}}" class="img-fluid" alt="Responsive image">
				<div class="position-absolute top-50 start-50 translate-middle" style="background: #001928; width: -webkit-fill-available;">
					<h1 style="text-align: center;text-transform: uppercase; display: block; color: #FDFEFE; position: relative;
					font-family: 'Shippori Mincho', serif;">A Segunda Guerra Fria</h1>
				</div>
			</div>


    <div class="container-fluid">
      <div class="row" style="background:#001928;">
        <div class="col" style="margin: 3% 8% 2%">
            <h3 style="color: #FFFFFF; text-align: center">
              Entenda porque você está vivendo uma Guerra Fria, e como isso impacta todo o mundo.
            </h3>
        </div>                                           
      </div>
    </div>
    
@endsection

@section('content')
    <div class="container-fluid Grad" style="margin: unset!important; padding:unset!important">
      <div class="row p-3">
        <div class="col-lg-6 ">               
          <img src="{{asset('img/xadrezCanvasG.jpg')}}" class="img-fluid" alt="Responsive image">
                                                      
        </div>
        <div class="col-lg-6 ">               
          <h4 style="color: #FFFFFF">
            Para entender o que seria uma Guerra Fria, podemos pensar em um tabuleiro de Xadrez. 
            Imagine o mundo como um grande tabuleiro, onde países são peças, como torres, cavalos, reis e rainhas. </br></br>
            Obviamente o mundo é muito mais complexo que um tabuleiro de xadrez comum, há vários blocos militares, econômicos, 
            alianças não muito claras, e cada um interpreta o “jogo” de um jeito. 
            Mas assim fica mais fácil de entender.</br></br>
            Essa maneira de ver as relações internacionais, entre países, continentes, é chamada de Tabuleiro Geopolítico. 
            E assim como muitos jogos de tabuleiro, como o de dama, xadrez, as pessoas entendem o jogo de um jeito. 
            Olhar para o planeta agora e dizer que está acontecendo uma nova Guerra Fria, uma Segunda Guerra Fria, 
            é uma maneira de enxergar. 
          </h4>
                                                      
        </div>
      </div>
   </div>

      
    <!--TimeLine-->
    <div class="container bootdey" style="padding: unset!important">
    <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="padding: unset!important">
    <div class="card">
    <div class="card-body">
    <!-- Timeline start -->
    <div class="timeline">
      <div class="timeline-row timeline-row-start">
        <div class="timeline-time">
          7:45PM<small>May 21</small>
        </div>
        <div class="timeline-dot fb-bg"></div>
        <div class="timeline-content">
            <img src="http://localhost:8000/storage/posts/post1.jpg" class="img-fluid" alt="Responsive image">
          <div class="timeline-text">
                <h4>Admin theme!</h4>
          <p>Milestone Admin Dashboard contains C3 graphs, flot graphs, data tables, calendar, drag &amp; drop and ion slider.</p>
          <a href="#" class="btn btn-secondary marginL">Veja Mais</a>
                </div>
        </div>
      </div>
      @foreach ($pages as $page)    

      <div class="timeline-row timeline-row-start">
        <div class="timeline-dot fb-bg"></div>
        <div class="timeline-content">
            <img src="{{Voyager::image($page->image)}}" class="img-fluid responsive" alt="Responsive image">
            <div class="timeline-text">
                  <h4>{{ $page->title }}</h4>
                  <p>{!! $page->excerpt !!}</p>           
          <a href="{{route('pages.slug', $page->slug)}}" class="btn btn-secondary marginL">Veja Mais</a>
            </div>
        </div>
      </div>
          
      @endforeach   
    </div>
    <!-- Timeline end -->
    </div>
    </div>
    </div>
    </div>
  </div>
  
<div class="row p-3">
 <div class="col">
  <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <a href="{{route('posts.slug', 'cinema')}}" style="text-decoration: none; color: black;"  >
        <img src="{{asset('img/flagEua_800.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h4>Primeiro Post</h4>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </a>
      </div>
      @foreach ($posts as $post)    

          <div class="carousel-item" data-bs-interval="2000">
            <a href="{{route('posts.slug', $post->slug)}}" style="text-decoration: none; color: black;"  >     
              <img src="{{Voyager::image($post->image)}}" class="d-block w-100 img-fluid" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4>{{ $post->title }}</h4>
                <p>{!! $post->excerpt !!}</p>
              </div>
            </a>
          </div>
     
      @endforeach   

      <div class="carousel-item" data-bs-interval="2000">
            <a href="{{route('posts')}}" style="text-decoration: none; color: black;"  >     
              <img src="{{asset('img/flagEua_800.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h3>Veja todos os Posts</h3>
              </div>
            </a>
          </div>
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
 </div>
</div>
  
@endsection

@section('footer')
  <div id="footer">
				<div class="container medium">

					<header class="major last">
						<h2>Acompanha também em outras plataformas</h2>
					</header>

					<ul class="icons">
						
						<li><a href="https://github.com/Vinif145/guerra-fria-laravel-" class="icon brands fa-github"></a></li>
				
					</ul>

					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li>
					</ul>

				</div>
			</div>
@endsection

@section('javascript')
    <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
    
    <script src="https://kit.fontawesome.com/2c19de257c.js" crossorigin="anonymous"></script>
    
    <script type="text/javascript">

    debounce = function(func, wait, immediate) {
      var timeout;
      return function() {
        var context = this, args = arguments;
        var later = function() {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    };


    var $target = $('.timeline-row'),
    animationClass = 'timeline-row-start', 
    offset = $(window).height() * 3/4; 

    (function(){
      var $target = $('.timeline-row'),
          animationClass = 'timeline-row-start',
          offset = $(window).height() * 3/4;

      function animeScroll() {
        var documentTop = $(document).scrollTop();

        $target.each(function(){
          var itemTop = $(this).offset().top;
          if (documentTop > itemTop - offset) {
            $(this).addClass(animationClass);
          } else {
            $(this).removeClass(animationClass);
          }
        });
      }

      animeScroll();

      $(document).scroll(debounce(function(){
        animeScroll();
      }, 200));
    })();

  </script>
  
   <script> 
      $(document).ready( () => {     
      var menu1 = $(".menu_show");
      $(document).scroll( function() {
          var scroll = $(document).scrollTop();
          if(scroll > 130 )  $(".menu_show").fadeIn();
           if(scroll <= 120  ) $(".menu_show").fadeOut();
      });       
      });
   </script>

@endsection

 
