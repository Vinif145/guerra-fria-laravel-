@extends('layouts.posts')

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
        </div>
</div>
    
@endsection


