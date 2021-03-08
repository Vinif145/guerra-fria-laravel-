@extends('includes.base')

@section('content')
<div class="container" >
       <div class="row">
                 @foreach ($pages as $page)
                 <a class="col-3" href="{{route('pages.slug', $page->slug)}}" style="text-decoration: none; color: black;"  >
                        <article>
                                <div class="row p-3">

                                        <img src="{{Voyager::image($page->image)}}" class="img-fluid" alt="Responsive image" style="padding: unset">
                                        <h1>{{ $page->title }}</h1>
                                        <p>{!! $page->excerpt !!}</p>    
                                        
                                </div>
                        </article>
                </a>
                @endforeach     
        </div>
</div>
@endsection