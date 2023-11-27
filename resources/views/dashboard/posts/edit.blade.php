@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap">
    <h1>Edit Posts</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{$post->slug}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror outline-none" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="hidden" name="oldImage" value="{{$post->image}}">
            @if($post->image)
                <img src="{{asset('storage/' . $post->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview" style="display: none;">

            @else
                <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview" style="display: none;">
            @endif

            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <div id="editor"></div>
            <input type="hidden" name="body" id="body" value="{{ old('body', $post->body) }}">
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Update Post</button>
    </form>
</div>



<script>
    const titleInput = document.querySelector("input[name='title']");
    const slugInput = document.querySelector("#slug");
    const categorySelect = document.querySelector("#category");
    const bodyInput = document.querySelector("#body");

    // Function to generate slug from title
    function generateSlug(title) {
        return title.replace(/ /g, "-").toLowerCase();
    }

    // Function to update slug field
    function updateSlug() {
        const titleValue = titleInput.value;
        slugInput.value = generateSlug(titleValue);
    }

    // Function to update body field
    function updateBody(editor) {
        const content = editor.getData();
        bodyInput.value = content;
    }

    titleInput.addEventListener("keyup", updateSlug);

    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            // Set initial content from old input value
            editor.setData({!! json_encode(old('body', $post->body)) !!});

            // Update body input on editor change
            editor.model.document.on('change:data', () => {
                updateBody(editor);
            });
        })
        .catch(error => {
            console.error(error);
        });

        function previewImage(){

        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('#img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

        }
</script>


@endsection
