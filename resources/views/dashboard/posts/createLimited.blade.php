@extends('dashboard.layouts.main')

@section('container')

<div class="col-lg-8">
    <form id="zuzu" method="post" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview" style="display: none;">
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div id="editor"></div>
            <input type="hidden" name="body" id="body" value="{{ old('body') }}">
        </div>

        @if(auth()->check() && (auth()->user()->is_premium || auth()->user()->is_admin || auth()->user()->posts->count() < auth()->user()->posts_limit))
        <button type="submit" id="submitBtn" class="btn btn-success" style="background-color: #116D6E">Create Post</button>
    @else
        <p class="text-danger" id="limitExceededMessage">
            You cannot create a new post because you have reached the posting limit.
            Upgrade to premium to get free package or buy a package.
        </p>
        <a href="/pricing" class="btn" style="background-color: black; color:#FAF6F0;">
            <i class="bi bi-arrow-left"></i> Buy Now
        </a>
    @endif
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector("#zuzu");
        const titleInput = document.querySelector("input[name='title']");
        const slugInput = document.querySelector("#slug");
        const categorySelect = document.querySelector("#category");
        const bodyInput = document.querySelector("#body");

        function generateSlug(title) {
            return title.replace(/ /g, "-").toLowerCase();
        }

        function updateSlug() {
            const titleValue = titleInput.value;
            slugInput.value = generateSlug(titleValue);
        }

        function updateBody(editor) {
            editor.model.document.on('change:data', () => {
                bodyInput.value = editor.getData();
            });
        }

        titleInput.addEventListener("keyup", updateSlug);

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                updateBody(editor);
            })
            .catch(error => {
                console.error(error);
            });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    });
</script>

@endsection
