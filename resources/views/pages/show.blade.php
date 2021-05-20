
@extends('layouts.pages')

@section('content')
<header class="masthead" style="background-image: url('{{Voyager::image($page->image)}}');">
  <div class="overlay">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="SecOverlay">
                    <div class="post-heading">
                        <h1 class="text-center">{{ $page->title }}</h1>
                        <h2 class="text-center subheading">{!! $page->excerpt !!}</h2>
                        <span class="meta text-center ">Escrito por
                            <a href="{{route('pages.autor', $author->role_id)}}">{{ $author->name}}</a>
                            em {{\Carbon\Carbon::parse($page->updated_at)->format('d/m/Y')}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
  </div>
</header>


<div class="container-lg p-5 mt-3 pad-2 ">
      <div class="d-flex justify-content-center">
                 <div class="row">
                        <div class="col">   
                    
                            <div class="div">{!!$page->body!!}</div>
                                                              
                        </div>
                </div>
       </div>
       
</div>
    
@endsection

