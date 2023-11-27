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

    <div class="table-responsive small col-lg-12  ">
        <a href="/dashboard/posts/create" class="btn btn-dark mb-3">Create New Post</a>
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createPostModal"style="background-color: #116D6E">
            Quick Create Post
        </button>
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
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ optional($post->category)->name ?: 'Uncategorized' }}</td>
                        <td class="between">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="action-link">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="action-link"
                                style="background-color: #2C3E50;">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST"
                                style="display: inline;">
                                @method('delete')
                                @csrf
                                <button type="submit" class="action-btn"
                                    onclick="return confirm('Are you sure')">
                                    <i class="bi bi-x-circle"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel"
    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        aria-hidden="true">
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
                            <button type="button" class="btn btn-dark"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" style="background-color: #116D6E">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    .custom-table-style {
        background-color: #000000;
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
</script>
