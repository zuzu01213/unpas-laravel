@extends('layouts.main')
@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/random/1200x400?sig=" class="card-img-top" alt="...">
            <div class="card-body">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-body-secondary">
                        By: <a href="/author/{{ $posts[0]->author->username }}" class="author">{{ $posts[0]->author->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="position-absolute bg-dark p-3 text-white">{{$post->category->name}}</div>
                            <img src="https://source.unsplash.com/random/500x500?sig={{ $loop->index + 1 }}" class="card-img-bottom" alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <a href="/posts/{{ $post->slug }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                                <p>
                                    <small class="text-body-secondary">
                                        By: <a href="/author/{{ $post->author->username }}" class="author">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif

    <style>
        body {
            background-color: white;
            text-align: center
        }

        article {
            border-bottom: 1px solid black;
        }

        .author, .categ {
            color: brown;
        }

        .btn-primary {
            background-color: #22092C;
            border: none
        }

        .btn-primary:hover {
            background-color: lightcoral;
            color: black;
        }

        div.card-body {
            background-color: #FCF5ED;
            border: 1px solid black;
        }

    </style>

@endsection
