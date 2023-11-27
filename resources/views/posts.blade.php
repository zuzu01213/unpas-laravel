@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title ?? 'All Posts' }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts" method="GET">
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                @if (request('categories'))
                    <input type="hidden" name="categories" value="{{ request('categories') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary custom-btn" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3 fade-from-bottom">
            @if ($posts[0]->image)
            <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/'. $posts[0]->image) }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; " alt="{{ $posts[0]->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/random/1200x400?sig=" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body">
                <h3 class="card-title">
                    <a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                </h3>
                <p>
                    <small class="text-body-secondary text-muted">
                        By:
                        @if ($posts[0]->author)
                            <a href="/posts?author={{ $posts[0]->author->username }}" class="author">{{ $posts[0]->author->name }}</a>
                        @endif
                        in
                        @if ($posts[0]->category)
                            <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        @endif
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4 fade-from-bottom">
                        <div class="card d-flex flex-column h-100">
                            <form action="/posts" method="GET" id="categoryForm">
                                @if ($post->category)
                                    <input type="hidden" name="category" value="{{ $post->category->slug }}">
                                    <button type="button" onclick="redirectToCategory('{{ $post->category->slug }}')" class="category-label">{{ $post->category->name }}</button>
                                @else
                                    <span class="category-label">Uncategorized</span>
                                @endif
                            </form>
                            @if ($post->image)

                            <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 56%; " alt="{{ $posts[0]->category->name }}">
                            @else
                            <img src="https://source.unsplash.com/random/500x500?sig={{ $loop->index + 1 }}" class="card-img-bottom" alt="{{ optional($post->category)->name }}">
                            @endif

                            <div class="card-body d-flex flex-column justify-content-between">
                                <a href="/posts/{{ $post->slug }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                                <p>
                                    <small class="text-body-secondary">
                                        By:
                                        @if ($post->author)
                                            <a href="/posts?author={{ $post->author->username }}" class="author">{{ $post->author->name }}</a>
                                        @endif
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary mx-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found.</p>
        <a href="/posts" class="btn btn-primary">Back to Posts</a>
    @endif

    <div>
        {{ $posts->links() }}
    </div>




        <style>
            body {
                background-color: white;
                text-align: center;
            }

            article {
                border-bottom: 1px solid black;
            }

            .text-body-secondary>a {
                color: brown;
            }

            .input-group input.form-control {
                border: 1px solid black;
                border-right: none;
                box-shadow: none;
            }

            .btn-primary:hover {
                background-color: lightcoral;
                color: black;
            }

            .btn-primary:active {
                background-color: white !important;
                color: black !important;
            }

            div.card-body {
                background-color: #FCF5ED;
                border: 1px solid black;
                border-top: none;
            }

            div.row {
                margin-top: 30px;
            }

            .category-label {
                position: absolute;
                top: 0;
                left: 0;
                padding: 0.5rem 1rem;
                background-color: rgba(0, 0, 0, 0.7);
                color: white;
                text-decoration: none;
                overflow: hidden;
                width: 0;
                transition: width 0.3s ease;
            }

            .card:hover .category-label {
                width: 100%;
                color: rgb(170, 79, 79);
            }

            .fade-from-bottom {
                opacity: 1;
                transform: translateY(20px);
                transition: opacity 0.5s, transform 0.5s;
            }

            .fade-from-bottom:hover {
                opacity: 1;
                transform: translateY(0);
            }

            .card-img-bottom {
                border: 1px solid black;
                border-bottom: none;
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;
            }

            .card {
                margin-bottom: 20px;
            }

            .btn-primary {
                background-color: #22092C;
                border: none;
            }

            .btn-outline-secondary {
                background-color: rgb(122, 34, 34);
                color: white;
            }

            h1 {
                font-size: 3rem;
                letter-spacing: 2px;
                color: #333;
                margin-bottom: 20px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }

            .pagination {
                display: flex;
                justify-content: center;
                list-style: none;
                margin: 20px 0;
                background-color: transparent;
            }

            .pagination li {
                margin: 0 5px;
            }

            .pagination li a,
            .pagination li span {
                display: block;
                padding: 0.5rem 1rem;
                text-decoration: none;
                color: #fff;
                background-color: black;
                border: 2px solid black;
                transition: background-color 0.3s ease;
            }

            .pagination li.active a,
            .pagination li.active span {
                background-color: rgb(71, 0, 0);
                color: white;
                border: none; /* Remove border when active */
            }

            .pagination li a:hover {
                background-color: white;
                color: black;
                border-color: #22092C;
            }

            .pagination .page-item.disabled .page-link {
                background-color: black;
                color: white;
                border-color: black;
            }
            .pagination li a:active{

            }
        </style>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.style.visibility = 'visible';
    });
    function redirectToCategory(categorySlug) {
        window.location.href = '/posts?category=' + categorySlug;
    }
</script>

@endsection
