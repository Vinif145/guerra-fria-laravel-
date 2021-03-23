@extends('layouts.base')

@section('content')
<div class="container">
      <div class="d-flex justify-content-center">
                 <div class="row">
                     @foreach ($category->posts as $post)
                       <article>
                                <a class="row mb-3" href="{{route('posts.slug', $post->slug)}}" style="text-decoration: none; color: black;"  >
                                        <div class="col-sm-4" style="padding: unset">
                                        <img src="{{Voyager::image($post->image)}}" class="img-fluid" alt="Responsive image">
                                        </div> 

                                        <div class="col-sm-8">               
                                                <h1>{{ $post->title }}</h1>
                                                <p>{!! $post->excerpt !!}</p>
                                                <p>{{ $post->slug}}</P>
                                        </div>
                                </a>
                        </article>
                    @endforeach
                    
                </div>
       </div>
       
</div>
