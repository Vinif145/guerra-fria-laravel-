@extends('layouts.base')

@section('head')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<link href="{{ asset('css/PopoverPages.css') }}" rel="stylesheet">
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
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Vacuum</h5><p>O mesmo que vácuo: vazio, oco.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover2"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Multifacetada</h5><p>Algo dificíl de se indentificar, com várias faces, características, atributos.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover3"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Bélico</h5><p>Relativo à Guerra, conflitos armados.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover4"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Lonely Power</h5><p>Termo geopolítico que significa "poder solitário", sem equivalentes.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover5"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Modus Operandi</h5><p> "modo de operação", termo usado para expresar o modo de agir, executar.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover6"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Télos</h5><p> finalidade, sentido.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover7"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Macro</h5><p> Maior; com mais alcance, abrangência.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover8"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Do Inglês</h5><p>"setores Americanos invísiveis".</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover9"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Motriz</h5><p> Explicação movedora, principal.</p></div>'
    }) 
});
</script>
<script> 
$(document).ready(function(){
	 $('[data-toggle="popover10"]').popover({
          //trigger: 'focus',
		      trigger: 'hover',
          html: true,
          content: '<div class="media-body"><h5>Monolíticas</h5><p> indivisível, rígida.</p></div>'
    }) 
});
</script>
@endsection