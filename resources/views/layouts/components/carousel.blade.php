<div class="row p-3">
 <div class="col">
  <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <a href="{{route('posts.slug', 'cinema')}}" style="text-decoration: none; color: black;"  >
        <img src="{{asset('img/flagEua_800.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Primeiro Post</h3>
            <h4>Some representative placeholder content for the first slide.</h4>
            
          </div>
        </a>
      </div>
      @forelse ($posts as $post)    

          <div class="carousel-item" data-bs-interval="2000">
            <a href="{{route('posts.slug', $post->slug)}}" style="text-decoration: none; color: black;"  >     
              <img src="{{Voyager::image($post->image)}}" class="d-block w-100 img-fluid" alt="...">
              <div class="carousel-caption d-none d-sm-block">
                <h3>{{ $post->title }}</h3>
                <h4>{!! $post->excerpt !!}</h4>
                <h5>@if($post->authorId) Postado por {{ $post->authorId->name}} @endif  gi {{ $post->updated_at}}</h5>
                
              </div>
            </a>
          </div>
      @empty
      
      @endforelse 

      <div class="carousel-item" data-bs-interval="2000">
            <a href="{{route('posts')}}" style="text-decoration: none; color: black;"  >     
              <img src="{{asset('img/flagEua_800.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h3>Veja todos os Posts</h3>
              </div>
            </a>
          </div>
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
 </div>
</div>