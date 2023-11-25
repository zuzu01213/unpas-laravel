@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}" class="category-link">
                        <div class="card text-bg-dark text-white category-card">
                            <img src="https://source.unsplash.com/random/500x500?sig={{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center">
                                <h4 class="card-title text-center flex-fill p-2">{{ $category->name }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        body {
            background-color: #FAF6F0;
            text-align: center;
        }

        a.category-link {
            text-decoration: none;
            color: inherit;
            overflow: hidden;
            position: relative;
            display: inline-block;
        }

        .category-card {
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.3s ease-in-out;
        }

        .category-card:hover {
            transform: scale(1.1);
        }

        .card-img {
            transition: transform 0.3s ease-in-out;
        }

        .category-card:hover .card-img {
            transform: scale(1.1);
        }

        h4 {
            color: black;
        }
    </style>
        @if(request()->is('categories'))
        <style>
            .nav-kedua {
                display: none;
            }
        </style>
        @endif
@endsection
