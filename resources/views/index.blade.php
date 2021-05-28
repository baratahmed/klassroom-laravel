@extends('master')

@section('content')
{{-- <h3 class="pb-3 mb-4 font-italic border-bottom">
  From the Firehose
</h3> --}}
<style>
  .blog-post-title{
    font-size: 1.7rem !important;
  }
</style>

@foreach ($articles as $article)
  <div class="blog-post">
      <h2 class="blog-post-title">{{$article->title}}</h2>
      <p class="blog-post-meta">{{$article->created_at->format('F d,Y h:i A')}} by <a href="#">{{$article->user->full_name}}</a> on <a href="#">{{$article->category->name}}</a> ({{$article->created_at->diffForHumans()}})</p>
      <p>{{$article->content}}</p>
      <hr>
      <hr>
  </div><!-- /.blog-post -->
@endforeach

{{-- {{$articles->links()}} --}}
{{-- <nav class="blog-pagination">
  <a class="btn btn-outline-primary" href="#">Older</a>
  <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
</nav> --}}
@endsection