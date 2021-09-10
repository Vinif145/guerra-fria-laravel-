@extends('layouts.posts')

@section('content')
<div class="container mb-3" >
       <div class="row">
                 @foreach ($pages as $page)
                 <a class="col-sm-4" href="{{route('pages.slug', $page->slug)}}" style="text-decoration: none; color: black;"  >
                        <article>
                                <div class="row p-3">

                                        <img src="{{Voyager::image($page->image)}}" class="img-fluid" alt="Responsive image" style="padding: unset">
                                        <h1>{{ $page->title }}</h1>
                                        <p>{!! $page->excerpt !!}</p>    
                                        
                                </div>
                        </article>
                </a>
                @endforeach  

                {{ $pages->links() }}   
        </div>
</div>
@endsection

@section('footer')
  @includeIf('layouts.components.footer2')
@endsection