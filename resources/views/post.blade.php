
@extends('layouts.main')

@section('container')
    <article class="mb-5 border-bottom">
       <h2>{{ $post->title }}</h2>
       <p>By. Keenan Rahmanda in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
       {!! $post->body !!}
    </article>
    <style>
        body {
            background-color: blanchedalmond;
            text-align: center
        }
        article {
            border-bottom-style: solid;
        }
    </style>
    <a href="/posts">Back to Posts</a>
@endsection
