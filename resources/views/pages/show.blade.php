
@extends('layouts.pages')

@section('content')
<div class="container-lg p-5 mt-3 pad-2 ">
      <div class="d-flex justify-content-center">
                 <div class="row">
                        <div class="col">   
                                
                            <h1 class="text-center">{{ $page->title }}</h1>
                            <h3 class="text-center">{!! $page->excerpt !!}</h3>
                            <p class="text-center">{{ $author->name}}</P>
                            <p class="text-center">{{ $page->updated_at}}</P>  
                            <img src="{{Voyager::image($page->image)}}" class="img-fluid" alt="Responsive image">
                            <div class="div">{!!$page->body!!}</div>
                                                              
                        </div>
                </div>
       </div>
       
</div>
    
@endsection
