@extends('layouts.posts')

@section('header')

<div class="mt-2 me-3" style="text-align: end">
        <form action="{{route ('posts.search')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Filtrar:">
                <button type="submit">Filtrar</bottom>
        </form> 
</div>
@endsection

@section('content')

<div class="container" >    
        
        
       <div class="row">
              
                @foreach ($posts as $post)
                 <a class="col-sm-4" href="{{route('posts.slug', $post->slug)}}" style="text-decoration: none; color: black;"  >
                        <article>
                                <div class="row p-3">

                                        <img src="{{Voyager::image($post->image)}}" class="img-fluid" alt="Responsive image" style="padding: unset">
                                        <h1>{{ $post->title }}</h1>
                                        <p>{!! $post->excerpt !!}</p>
                                        
                                </div>
                        </article>
                </a>     
                @endforeach

                {{ $posts->links() }}
                 
                 <div id="break"></div>
                <div id="main">
                                <div class="row">
                                                <section class="tiles col-sm-4 p-3">
                                                        <article class="style1">
                                                                <span class="image">
                                                                        <img src="../img/EuaFlag.jpg" class="img-fluid" alt="" />
                                                                </span>
                                                                <a href="{{route('categories.slug', 'eua')}}">
                                                                        <h2>EUA</h2>
                                                                        <div class="content">
                                                                                <h4>Clique aqui e veja os posts relacionados aos Estados Unidos.</h4>
                                                                        </div>
                                                                </a>
                                                        </article>

                                                        <article class="style1">       
                                                                <span class="image">
                                                                        
                                                                        <div id="vitrine"></div>
                                                                        <div id="vitrine2"></div>
                                                                        <div id="vitrine3"></div>
                                                                </span>
                                                                <a href="{{route('categories.slug', 'russia')}}">
                                                                        <h2>Rússia</h2>
                                                                        <div class="content">
                                                                                <h4>Clique aqui e veja os posts relacionados à Rússia.</h4>
                                                                        </div>
                                                                </a>
                                                        </article>

                                                        <article class="style1">       
                                                                <span class="image"> 
                                                                      <img src="../img/800px-Geopolitica-capa.png" class=" desfoque" alt="" />
                                                                </span>
                                                                <a href="{{route('categories.slug', 'geopolitica')}}">
                                                                        <h2>Geopolítica</h2>
                                                                        <div class="content">
                                                                                <h4>Clique aqui e veja os posts que abordam a Geopolítica.</h4>
                                                                        </div>
                                                                </a>
                                                        </article>
                                                </section>                                                    
                                    </div>
                 </div>
                <!--@foreach ($categorias as $categoria)
                  <a class="btn btn-primary" href="{{route('categories.slug', $categoria->slug)}}" role="button"> {{ $categoria->name }}</a>
                @endforeach  -->   
        </div>
</div>
    
@endsection

@section('footer')
  @includeIf('layouts.components.footer2')
@endsection

