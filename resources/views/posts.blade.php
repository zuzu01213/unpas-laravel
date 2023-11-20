@extends('layouts.main')
@section('container')


@foreach ($posts as $post )
<article class="mb-5">
  <h2><a href="/posts/{{ $post->slug }}">{{ $post->title  }}</h2></a>
  <p>By. Keenan Rahmanda in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
  <p>{{ $post->excerpt }}</p>
  <a href="/posts/{{ $post->slug }}">Read More..</a>
</article>
<style>
  body {
    background-color: blanchedalmond;
    text-align: center
  }
  article {
    border-bottom: 1px solid black;

  }
</style>
@endforeach

@endsection
