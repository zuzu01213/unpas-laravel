@extends('layouts.main')
@section('container')
  

@foreach ($posts as $post )
<article class="mb-5">
  <h2><a href="/posts/{{ $post->id }}">{{ $post->title  }}</h2></a>
  <p>{{ $post->excerpt }}</p>
<style>
  body {
    background-color: whitesmoke;
    text-align: center
  }
  a {
    text-decoration-color: rebeccapurple;
    color: green
  }
</style>
</article>
@endforeach 

@endsection