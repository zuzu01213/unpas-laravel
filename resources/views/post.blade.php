
@extends('layouts.main')

@section('container')
    <article class="mb-5 ">
       <h2>{{ $post->title }}</h2>
       <p>By: <a href="/author/{{$post->author->username}}" class="author">{{$post->author->name}}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
       {!! $post->body !!}
    </article>
    <style>
        body {
            background-color: #FAF6F0;
            text-align: center
        }
        article {
            border-bottom: 1px solid black;
        }
        .author {
            color: brown;
        }
    </style>
    <a href="/posts">Back to Posts</a>
@endsection
