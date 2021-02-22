<html> 
    <head>
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet"><!--Nossa própria folha de estilo -->
    <script src="{{ asset('js/timeline.js') }}"></script>

    <!-- Bootstrap Section -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
     
    </head>

    <body>
<section class="intro">
  <div class="container">
    <h1>Vertical Timeline &darr;</h1>
  </div>
</section>

<section class="timeline">
  <ul>
    <li>
        <div>
            
            <img src="{{asset('img/QuedaMuroBerlim.jpg')}}" style="height: 200px; width: 400px; position: relative; margin-bottom: 15px;">
            <h1 class= "ms-3 mb-1 text-uppercase">Pós- Guerra Fria</h1>
            <p class="format ms-3">A queda do Bloco Soviético inaugurou uma nova fase no tabuleiro geopolítico, possibilitando
                a expansão dos EUA. 
            </p>
            <a href="#" class="btn btn-secondary marginL">Veja Mais</a>
            
        </div>
    </li>
    <li>
        <div class="BiColor">
            
            <img src="{{asset('img/QuedaMuroBerlim.jpg')}}" style="height: 200px; width: 400px; position: relative; margin-bottom: 15px;">
            <h1 class= "ms-2 mb-1 text-uppercase">Expansão Americana</h1>
            <p class="format ms-2">Se apoiando na OTAN e no dólar como moeda internacional, seria os EUA
                o novo Hegemon? </p>
            <a href="#" class="btn btn-secondary marginL">Veja Mais</a>
            
        </div>
    </li>
    <li>
        <div>
            
            <img src="{{asset('img/QuedaMuroBerlim.jpg')}}" style="height: 200px; width: 400px; position: relative; margin-bottom: 15px;">
            <h1 class= "ms-3 mb-1 text-uppercase">Pós- Guerra Fria</h1>
            <p class="format ms-3">A queda do Bloco Soviético inaugurou uma nova fase no tabuleiro geopolítico </p>
            <a href="#" class="btn btn-secondary marginL">Veja Mais</a>
            
        </div>
    </li>
  </ul>  

 
    </body>
<script>
(function() {

  'use strict';

  // define variables
  var items = document.querySelectorAll(".timeline li");

  // check if an element is in viewport
  // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 100 &&
      rect.left >= 100 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function callbackFunc() {
    for (var i = 0; i < items.length; i++) {
      if (isElementInViewport(items[i])) {
        items[i].classList.add("in-view");
      }
    }
  }

  // listen for events
  window.addEventListener("load", callbackFunc);
  window.addEventListener("resize", callbackFunc);
  window.addEventListener("scroll", callbackFunc);

})();
</script>

</html>