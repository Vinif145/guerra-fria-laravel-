<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
      <!--  All snippets are MIT license http://bootdey.com/license -->
      <title>Index</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <link href="{{ asset('css/estilo2.css') }}" rel="stylesheet"><!--Nossa própria folha de estilo -->
  </head>

  <body>
       <div id="header">
				<span class="logo icon fa-paper-plane"></span>
				<h1>Hi. This is Directive.</h1>
				<p>A responsive HTML5 + CSS3 site template designed by <a href="http://html5up.net">HTML5 UP</a>
				<br />
				and released for free under the <a href="http://html5up.net/license">Creative Commons license</a>.</p>
			</div>

    <header style="background: url('{{asset("img/A Segunda Guerra Fria.png")}}'); background-size: cover; background-position: center center; height: 100vh; width: 100vw;">
      <div class="position-absolute top-50 start-50 translate-middle" style="background: #001928; width: inherit;">
        <h1 style="text-align: center;text-transform: uppercase; display: block; color: white; position: relative;
        font-family: 'Shippori Mincho', serif;">A Segunda Guerra Fria</h1>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row" style="background:#001928;">
        <div class="col" style="margin: 3% 8% 2%">
            <p style="color: #FFFFFF; ">
              Para entender o que seria uma Guerra Fria, podemos pensar em um tabuleiro de Xadrez, 
              na verdade o termo Tabuleiro Geopolítico trata justamente dessa analogia. 
              Imagine o mundo como um grande tabuleiro, onde países são peças, 
              como torres, cavalos, reis e rainhas. Isso é o Tabuleiro Geopolítico. 
              Obviamente é muito mais complexo que uma xadrez comum, há vários blocos militares, 
              econômicos, alianças não muito claras, e cada um interpreta o jogo de um jeito. 
            </p>
        </div>                                           
      </div>
    </div>
    

    <div class="container-fluid" style="background:#003f5b margin: unset!important; padding:unset!important">
      <div class="row p-3 m-1" style="background:#003f5b">
        <div class="col-sm-6">               
          <img src="{{asset('img/xadrezCanvasG.jpg')}}" class="img-fluid" alt="Responsive image">
                                                      
        </div>
        <div class="col-sm-6">               
          <h5 style="color: #FFFFFF">Para entender o que seria uma Guerra Fria, podemos pensar em um tabuleiro de Xadrez, 
            na verdade o termo Tabuleiro Geopolítico trata justamente dessa analogia. 
            Imagine o mundo como um grande tabuleiro, onde países são peças, 
            como torres, cavalos, reis e rainhas. Isso é o Tabuleiro Geopolítico. 
            Obviamente é muito mais complexo que uma xadrez comum, há vários blocos militares, 
            econômicos, alianças não muito claras, e cada um interpreta o jogo de um jeito. </h5>
                                                      
        </div>
      </div>
   </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
            <img src="http://localhost:8000/storage/posts/post1.jpg" class="d-block w-100 h-50 " alt="...">
     </div> 
     @foreach ($posts as $post)
                <div class="carousel-item">
                 <img src="{{Voyager::image($post->image)}}" class="d-block w-100 h-50" alt="...">
                </div> 
    @endforeach     
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!--TimeLine-->
    <div class="container bootdey">
    <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
      <<div class="timeline-row timeline-row-start">
        <div class="timeline-time">
          7:45PM<small>May 21</small>
        </div>
        <div class="timeline-dot fb-bg"></div>
        <div class="timeline-content">
            <img src="{{asset('img/image33.png')}}" class="img-fluid" alt="Responsive image">
          <div class="timeline-text">
                <h4>Admin theme!</h4>
          <p>Milestone Admin Dashboard contains C3 graphs, flot graphs, data tables, calendar, drag &amp; drop and ion slider.</p>
          <a href="#" class="btn btn-secondary marginL">Veja Mais</a>
                </div>
        </div>
      </div>
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
    </div>
    <!-- Timeline end -->
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script> -->
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


  </body>
</html>