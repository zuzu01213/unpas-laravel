
@extends('layouts.main')

@section('container')
    <article class="mb-5">
       <h2>{{ $post["title"] }}</h2>
       <h5>{{ $post["author"] }}</h5>
       <p>{{ $post ["body"] }}</p>
    </article>
    <style>
        body {
            background-color: whitesmoke;
            text-align: center
        }
    </style>
    <a href="/posts">Back to Posts</a>
@endsection