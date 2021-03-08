@extends('includes.base')

@section('content')
<div class="container">
      <div class="d-flex justify-content-center">
                 <div class="row">
                        <div class="col text-center">   
                                
                            <h1>{{ $page->title }}</h1>
                            <h2>{!! $page->excerpt !!}</h2>
                            <p>{{ $author->name}}</P>
                            <p>{{ $page->updated_at}}</P>  
                            <img src="{{Voyager::image($page->image)}}" class="img-fluid" alt="Responsive image">
                            <div class="mt-3" style="text-align: left;">{!! $page->body !!}</div>
                                                                 
                        </div>
                </div>
       </div>
       
</div>
    
@endsection
