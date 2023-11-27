@extends('dashboard.layouts.main')
@section('container')
<style>
    .not-center {
        text-align: left;
        margin: 0 auto;
    }
</style>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="not-center">
                <a href="/dashboard/posts" class="btn" style="background-color: #116D6E; color:#FAF6F0;">
                    <i class="bi bi-arrow-left"></i> Back to My Posts
                </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" type="submit" style="color: #FAF6F0; text-decoration:none; border-radius: 5px; cursor: pointer; padding-right: 18px; padding-top: 2px; padding-bottom: 8px; background-color: #321E1E;">
                    <i class="bi bi-pencil" style="padding-left: 3px; margin-right: 10px; font-size:1.4rem;"></i> Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" style="display: inline;">
                    @method('delete')
                    @csrf
                    <button type="submit" style="color: #FAF6F0; border-radius: 5px;  cursor: pointer; padding-right: 18px; padding-top: 0px; padding-bottom: 6px; background-color:#CD1818; " onclick="return confirm('Are you sure')">
                        <i class="bi bi-trash" style="padding-left: 3px; margin-right: 10px; font-size:1.4rem;"></i> Delete
                    </button>
                </form>
            </div>
            <h1>{{ $post->title }}</h1>
            @if ($post->image)
            <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid" style="object-fit: cover; width: 850px; height: 200px; " alt="{{ $post->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/random/1200x400?sig=" class="img-fluid"  alt="{{ $post->category->name }}">
            @endif
            <p class="text-secondary">By: <a href="/posts?author={{$post->author->username}}" class="author">{{$post->author->name}}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                {!! $post->body !!}

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
        padding-bottom: 20px;
    }

    .text-secondary>a {
        color: #8B4513;
    }
    .not-center a:hover {
        background-color: lightcoral !important;
            color: black  !important;
    }
    .not-center a:active{
        background-color: white !important;
            color: black !important;
    }
        button:hover {
            background-color: lightcoral !important;
            color: black  !important;

        }
        button:active{
            background-color: white !important;
            color: black !important;
        }
        a {
            text-decoration: none;
        }
</style>
@endsection
