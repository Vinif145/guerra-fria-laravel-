@extends('includes.base')

@section('content')
<div class="container" >
       <div class="row">
               
                @foreach ($posts as $post)
                        <article>
                                <a class="row mb-3" href="{{route('posts.slug', $post->slug)}}" style="text-decoration: none; color: black;"  >
                                        <div class="col-sm-4" style="padding: unset">
                                        <img src="{{Voyager::image($post->image)}}" class="img-fluid" alt="Responsive image">
                                        </div> 

                                        <div class="col-sm-8">               
                                                <h1>{{ $post->title }}</h1>
                                                <p>{!! $post->excerpt !!}</p>
                                                <p>{{ $post->authorId->name}}</P>
                                                <p>{{ $post->slug}}</P>
                                        </div>
                                </a>
                        </article>
                @endforeach     

                {{ $posts->links() }}

                @foreach ($categorias as $categoria)
                      
                       <a class="btn btn-primary" href="{{route('categories.slug', $categoria->slug)}}" role="button"> {{ $categoria->name }}</a>
                @endforeach     
        </div>
</div>
    
@endsection
