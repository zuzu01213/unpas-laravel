@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All your posts, {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-dark" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($userPosts->count())
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url('/dashboard/posts?postsPerPage=' . $userPosts->total()) }}" class="btn btn-warning mb-3" style="cursor: pointer; opacity: 1; background-color: gray; border: 1px solid black;">
                    All ({{ $userPosts->total() }} posts)
                </a>
                <button type="button" class="btn btn-warning mb-3" style="cursor: text; opacity: 1; background-color: #ffc107;">
                    Remaining Posts: {{ auth()->user()->posts_limit - auth()->user()->posts->count() }}
                </button>
                <a href="/dashboard/posts/create" class="btn btn-dark mb-3">Create New Post</a>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createPostModal" style="background-color: #116D6E">
                    Quick Create Post
                </button>
            </div>
            <div class="col-md-6">
                <form action="/dashboard/posts" method="GET">
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3 justify-content-end">
                        <div class="col-3" style="margin-right: 5px;">
                            <select class="form-select custom-input" name="category" aria-label="Select Category">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control custom-input" placeholder="Search.." name="search" value="{{ !empty(request('search')) ? request('search') : '' }}" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-secondary custom-btn" style="background-color: black; color: white; border-top-left-radius: 0; border-bottom-left-radius: 0;" type="submit">Search</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-warning mb-3" style="cursor: text; opacity: 1; background-color:blue; border: 1px solid black; color: white">
                        Publish
                    </button>
                    <button type="button" class="btn btn-warning mb-3" style="cursor: text; opacity: 1; background-color: blue; color: white">
                        Revert to draft
                    </button>
                    <a href="/dashboard/posts/create" class="btn btn-dark mb-3" style="background-color: blue; color: white">Delete </a>
                </div>
                <span>{{ $userPosts->firstItem() }} - {{ $userPosts->lastItem() }} of {{ $userPosts->total() }} </span>
                {{ $userPosts->links() }}
                <div>
                    @php
                        $totalPosts = $userPosts->total(); // Assuming $userPosts is your paginated posts collection
                        $step = 5;
                    @endphp

                    <select id="postsPerPage" onchange="changePostsPerPage()">
                        @for ($perPage = $step; $perPage <= $totalPosts; $perPage += $step)
                            <option value="{{ $perPage }}" {{ request('postsPerPage', 10) == $perPage ? 'selected' : '' }}>
                                {{ $perPage }}
                            </option>
                        @endfor
                        <option value="{{ $totalPosts }}" {{ request('postsPerPage', 10) == $totalPosts ? 'selected' : '' }}>
                            All
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table custom-table-style">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col" style="padding-left: 88px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userPosts as $post)
                    <tr>
                        <td>{{ ($userPosts->currentPage() - 1) * $userPosts->perPage() + $loop->index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ optional($post->category)->name ?: 'Uncategorized' }}</td>
                        <td class="between" style="padding-right: 0px">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="action-link">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="action-link" style="background-color: #2C3E50;">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" style="display: inline;">
                                @method('delete')
                                @csrf
                                <button type="submit" class="action-btn" onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="bi bi-x-circle"></i> Delete
                                </button>
                            </form>
                            <span>{{ $post->created_at->format('d/m/y') }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createPostModalLabel">Create New Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/dashboard/posts"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}"
                                    onkeyup="updateSlug('title', 'slug')">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category_id" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Post Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview"
                                    style="display: none;">
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="image"
                                    onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="body" value="{{ old('content') }}" type="hidden" name="body">
                                <trix-editor input="body"></trix-editor>
                            </div>
                            <div class="modal-footer">

                                    @if(auth()->check() && (auth()->user()->is_premium || auth()->user()->is_admin || auth()->user()->posts->count() < auth()->user()->posts_limit))
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="submitBtn" class="btn btn-success" style="background-color: #116D6E">Create Post</button>
                                @else

                                    <p class="text-danger" id="limitExceededMessage">
                                        You cannot create a new post because you have reached the posting limit.
                                        Upgrade to premium to get free package or buy a package.
                                    </p>
                                    <button type="button" class="btn btn-dark"
                                    data-bs-dismiss="modal">Close</button>
                                    <a href="/pricing" class="btn" style="background-color: red; color:#FAF6F0;">
                                        <i class="bi bi-arrow-left"></i> Buy Now
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else<div class="row">
            <div class="col-md-6">
                <a href="{{ url('/dashboard/posts?postsPerPage=' . $userPosts->total()) }}" class="btn btn-warning mb-3" style="cursor: pointer; opacity: 1; background-color: gray; border: 1px solid black;">
                    All ({{ $userPosts->total() }} posts)
                </a>
                <button type="button" class="btn btn-warning mb-3" style="cursor: text; opacity: 1; background-color: #ffc107;">
                    Remaining Posts: {{ auth()->user()->posts_limit - auth()->user()->posts->count() }}
                </button>
                <a href="/dashboard/posts/create" class="btn btn-dark mb-3">Create New Post</a>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createPostModal" style="background-color: #116D6E">
                    Quick Create Post
                </button>
            </div>
            <div class="col-md-6">
                <form action="/dashboard/posts" method="GET">
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3 justify-content-end">
                        <div class="col-3" style="margin-right: 5px;">
                            <select class="form-select custom-input" name="category" aria-label="Select Category">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control custom-input" placeholder="Search.." name="search" value="{{ !empty(request('search')) ? request('search') : '' }}" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-secondary custom-btn" style="background-color: black; color: white; border-top-left-radius: 0; border-bottom-left-radius: 0;" type="submit">Search</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-warning mb-3" style="cursor: text; opacity: 1; background-color: gray; border: 1px solid black;">
                        Publish
                    </button>
                    <button type="button" class="btn btn-warning mb-3" style="cursor: text; opacity: 1; background-color: #ffc107;">
                        Revert to draft
                    </button>
                    <a href="/dashboard/posts/create" class="btn btn-dark mb-3" style="background-color: #E74C3C">Delete </a>

                </div>
                <span>{{ $userPosts->firstItem() }} - {{ $userPosts->lastItem() }} of {{ $userPosts->total() }} </span>
                {{ $userPosts->links() }}
                <div>
                    <select id="postsPerPage" onchange="changePostsPerPage()">
                        @php $totalPosts = $userPosts->total(); @endphp
                        @foreach (range(5, $totalPosts, 5) as $perPage)
                            <option value="{{ $perPage }}" {{ request('postsPerPage', $totalPosts) == $perPage ? 'selected' : '' }}>
                                {{ $perPage }}
                            </option>
                        @endforeach
                        <option value="{{ $totalPosts }}" {{ request('postsPerPage', $totalPosts) == $totalPosts ? 'selected' : '' }}>
                            All
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <p class="text-center fs-4">No Post Found.</p>
        <div class="text-center">
            <a href="/dashboard/posts" class="btn btn-dark btn-lg">Back to My Posts</a>
        </div>
        @endif

@endsection

<style>
    .custom-table-style {
        background-color: #000000;
    }

    .input-group input.form-control {
        border: 1px solid black;
        border-right: none;
        box-shadow: none;
    }

    .action-link {
        color: white;
        margin-right: 10px;
        padding: 5px;
        border-radius: 5px;
        text-decoration: none;
        background-color: #116D6E;
    }

    .action-link:hover {
        opacity: 0.7;
    }

    .action-btn {
        color: #FAF6F0;
        border-radius: 5px;
        background-color: #CD1818;
        margin-right: 10px;
        padding: 5px;
        cursor: pointer;
        border: none;
    }

    .action-btn:hover {
        background-color: #E74C3C;
    }





    .pagination li a,
    .pagination li span {
        display: block;

        text-decoration: none;
        color: #fff;
        background-color: black;

        transition: background-color 0.3s ease;
    }

    .pagination li.active a,
    .pagination li.active span {
        background-color: #116D6E;
        color: white;
        border: none; /* Remove border when active */
    }

    .pagination li a:hover {
        background-color: #22092C;
        color: white;
       opacity: 0.8;
    }

    .pagination .page-item.disabled .page-link {
        background-color: black;
        color: white;
        border-color: black;
    }
    /* Add this to your existing CSS or create a new one */
#postsPerPage {
    display: block;
    text-decoration: none;
    color: #fff;
    background-color: black;
    padding: 5px 10px; /* Adjust padding as needed */
    border: 1px solid #000; /* Add a border for a more button-like appearance */
    border-radius: 5px; /* Add border-radius for rounded corners */
    cursor: pointer;
}

#postsPerPage:hover {
    background-color: #333; /* Change background color on hover */
}

</style>

<script>
    function submitModalForm() {

        document.querySelector('form').submit();
    }

    function updateSlug() {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const titleValue = titleInput.value.trim().toLowerCase().replace(/[^a-z0-9-]+/g, '-');
        slugInput.value = titleValue;
    }

    function previewImage() {
        const image = document.getElementById('image');
        const imgPreview = document.getElementById('img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    $('#createPostModal').on('shown.bs.modal', function () {

        document.querySelectorAll('trix-editor').forEach(function (editor) {
            new Trix.Editor(editor);
        });
    });
    function changePostsPerPage() {
    const postsPerPage = document.getElementById('postsPerPage').value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('postsPerPage', postsPerPage);
    window.location.href = `/dashboard/posts?${urlParams.toString()}`;
}





</script>
