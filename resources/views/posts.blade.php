@extends('layouts.main')
@section('container')
  

@foreach ($posts as $post )
<article class="mb-5">
  <h2><a href="/posts/{{ $post["slug"] }}">{{ $post["title"]  }}</h2></a>
  <h5>By: {{ $post["author"] }}</h5>
  <p>{{ $post["body"] }}</p>
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