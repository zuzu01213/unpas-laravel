@extends('dashboard.layouts.main')
@section('container')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="/dashboard/posts/{{$post->slug}}" style="color: brown; margin-right: 10px; padding: 5px; border-radius: 5px;">
                <i class="bi bi-eye" style="font-size: 1.5em;"></i>
            </a>
            <a href="/dashboard/posts/{{$post->slug}}" style="color: brown; margin-right: 10px; padding: 5px; border-radius: 5px;">
                <i class="bi bi-pencil-square" style="font-size: 1.5em;"></i>
            </a>
            <a href="/dashboard/posts/{{$post->slug}}" style="color: brown; margin-right: 10px; padding: 5px; border-radius: 5px; ">
                <i class="bi bi-x-circle" style="font-size: 1.5em;"></i>
            </a>
            <h1>{{ $post->title }}</h1>
            <p class="text-secondary">By: <a href="/posts?author={{$post->author->username}}" class="author">{{$post->author->name}}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            <img src="https://source.unsplash.com/random/1200x400?sig=" class="img-fluid" alt="{{ $post->category->name }}">
                {!! $post->body !!}
                <a href="/dashboard/posts" class="btn btn-primary">Back to My Posts</a>
            <article class="my-3 fs-5">

            </article>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #FAF6F0;
        text-align: center;
    }

    article {
        border-bottom: 1px solid black;
        padding-bottom: 20px; /* Adjust as needed */
    }

    .text-secondary>a {
        color: #8B4513; /* Brown color for better visibility */
    }
    .btn-primary {
            background-color: #22092C;
            border: none;
        }

        .btn-primary:hover {
            background-color: lightcoral;
            color: black;
        }
        .btn-primary:active{
            background-color: white !important;
            color: black !important;
        }

</style>
@endsection
