@extends('layout.main')

@section('content')

    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{ route('home') }}">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" focusable="false" role="img"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex flex-wrap justify-content-between">

    @foreach($categories as $category)
      <a class="p-2 text-muted" 
        href="{{ route('category', ['slug' => $category->slug]) }}">
        {{ $category->name }}
      </a>
    @endforeach
  

{{--       <a class="p-2 text-muted" href="#">World</a>
      <a class="p-2 text-muted" href="#">U.S.</a>
      <a class="p-2 text-muted" href="#">Technology</a>
      <a class="p-2 text-muted" href="#">Design</a>
      <a class="p-2 text-muted" href="#">Culture</a>
      <a class="p-2 text-muted" href="#">Business</a>
      <a class="p-2 text-muted" href="#">Politics</a>
      <a class="p-2 text-muted" href="#">Opinion</a>
      <a class="p-2 text-muted" href="#">Science</a>
      <a class="p-2 text-muted" href="#">Health</a>
      <a class="p-2 text-muted" href="#">Style</a>
      <a class="p-2 text-muted" href="#">Travel</a> --}}
    </nav>
  </div>
 @if($top_first)
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" style="background-size: cover;background-image: url({{ $top_first->image }})">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">{{ $top_first->title }}</h1>
      <p class="lead my-3">{!! str_limit($top_first->content, 100) !!}</p>
      <p class="lead mb-0"><a href="{{ route('article', ['slug' => $top_first->slug]) }}" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>

  </div>
@endif
  <div class="row mb-2">
    @if($top_second)
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="flex ">  
          @foreach($top_second->categories as $cat)
          <strong class="text-primary"> - {{ $cat->name }}</strong>
        @endforeach    

          <h3 class="mb-0">
            <a class="text-dark" href="#">{{ $top_second->title }}</a>
          </h3>
          <div class="mb-1 text-muted">{{ $top_second->created_at->format('F j,Y') }}</div>
          <p class="card-text mb-auto">{{ str_limit($top_second->content, 60) }}</p>
          <a href="{{ route('article', ['slug' => $top_second->slug]) }}">Continue reading</a>
        </div>
        <img src="{{ $top_second->image }}" class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
      </div>
    </div>
    @endif
    @if($top_third)
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="flex ">  
          @foreach($top_third->categories as $cat)
          <strong class="text-primary"> - {{ $cat->name }}</strong>
        @endforeach    

          <h3 class="mb-0">
            <a class="text-dark" href="#">{{ $top_third->title }}</a>
          </h3>
          <div class="mb-1 text-muted">{{ $top_third->created_at->format('F j,Y') }}</div>
          <p class="card-text mb-auto">{{ str_limit($top_third->content, 60) }}</p>
          <a href="{{ route('article', ['slug' => $top_third->slug]) }}">Continue reading</a>
        </div>
        <img src="{{ $top_third->image }}" class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
      </div>
    </div>
    @endif
  </div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        From the Firehose
      </h3>

      @foreach($articles as $article)

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $article->title }}</h2>

        @foreach($article->categories as $cat)
          <span class="blog-post-meta">{{ $cat->name }} </span>
        @endforeach

        <p class="blog-post-meta">{{ $article->created_at->format('F j,Y') }} 

          @if ($article->author)
          
          by <a href="#">{{ $article->author->name }}</a>
          
          @endif

        </p>

        {!! str_limit($article->content, 100) !!}

        <div>
          <a href="{{ route('article', ['slug' => $article->slug]) }}">Читать далее</a>
        </div>

      </div><!-- /.blog-post -->
      
      @endforeach


      {{ $articles->links('pagination.pagination') }}

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-3 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

    @if($dates->count())

      <div class="p-3">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          
          @foreach($dates as $date)
            <li><a href="{{ route('articles-date', ['month' => $date->month, 'year' => $date->year]) }}">
              {{ $date->monthName . ' ' . $date->year}}
            </a></li>
          @endforeach
          
        </ol>
      </div>

    @endif


      <div class="p-3">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>

@endsection