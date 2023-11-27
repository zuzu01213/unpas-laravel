@extends('layouts.main')

@section('container')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="text-secondary">By: <a href="/posts?author={{$post->author->username}}" class="author">{{$post->author->name}}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

            <!-- Progress Bar -->
            <progress id="scroll-progress" value="0" max="100"></progress>

            @if ($post->image)
            <div style="max-height: 250px; overflow: hidden;">
                <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; " alt="{{ $post->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/random/1200x400?sig=" class="img-fluid"  alt="{{ $post->category->name }}">
            @endif
                {!! $post->body !!}
                <a href="/posts" class="btn btn-primary">Back to Posts</a>
            <article class="my-3 fs-5">
            </article>
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

    .btn-primary:active {
        background-color: white !important;
        color: black !important;
    }

    #scroll-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: lightcoral;
        appearance: none;
    }

    #scroll-progress::-webkit-progress-bar {
        background-color: #fff;
    }

    #scroll-progress::-webkit-progress-value {
        background-color: lightcoral;
    }
</style>

<script>
    window.onscroll = function() {
        let scroll = document.documentElement.scrollTop || document.body.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (scroll / height) * 100;
        document.getElementById('scroll-progress').value = scrolled;
    };
</script>

@endsection
