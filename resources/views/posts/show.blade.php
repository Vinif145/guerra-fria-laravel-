@extends('layouts.pages')

@section('content')
      <header class="masthead" style="background-image: url('{{Voyager::image($post->image)}}');">
            <div class="overlay">  
                  <div class="container">
                        <div class="d-flex justify-content-center">
                              <div class="row">
                                    <div class="SecOverlay">
                                          <div class="col text-center post-heading">   
                                                    
                                                      <h1>{{ $post->title }}</h1>
                                                      <h2 class="text-center subheading">{!! $post->excerpt !!}</h2>
                                                      <span class="meta text-center ">Escrito por
                                                            <a href="{{route('author', $post->authorId)}}">{{ $post->authorId->name}}</a>
                                                            em {{\Carbon\Carbon::parse($post->updated_at)->format('d/m/Y')}}
                                                      </span>

                                                      <a  class="meta" id="link" href="{{route('categories.slug', $post->category->slug)}}">{{ $post->category->name}}</a>
                                                      
                                                      
                                                      
                                                            
                                                                  
                                          </div>
                                    </div>      
                              </div>
                        </div>
                        
                  </div>
            </div>      
      </header>

      <div class="container-lg p-5 mt-3 pad-2 ">
            <div class="div">
                  <div class="row">
                        <div class="col">   
                        
                              <div class="div">{!!$post->body!!}</div>
                                                                  
                        </div>
                  </div>
            </div>
       
      </div>
    
@endsection

