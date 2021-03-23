@extends('layouts.base')

@section('content')
<div class="container">
      <div class="d-flex justify-content-center">
                 <div class="row">
                        <div class="col text-center">   
                               
                                        <h1>{{ $post->title }}</h1>
                                        <h2>{!! $post->excerpt !!}</h2>
                                        <p>{{ $post->authorId->name}}</P>
                                        <p>{{ $post->updated_at}}</P>  
                                        <p>{{ $post->category->name}}</P>
                                        <img src="{{Voyager::image($post->image)}}" class="img-fluid" alt="Responsive image">
                                        <div class="mt-3" style="text-align: left;">{!! $post->body !!}</div>
                                       
                                          
                                                
                        </div>
                </div>
       </div>
       
</div>
    
@endsection

