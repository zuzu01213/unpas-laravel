@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap">
    <h1>Create New Posts </h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
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
            <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview" style="display: none;"> <!-- Tambahkan id="img-preview" dan style="display: none;" -->
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()"> <!-- Tambahkan id="image" -->
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
        <button type="submit" class="btn btn-dark">Create Post</button>
    </form>
</div>
<style>
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/44.0.3/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
<script src="https://ckeditor.com/docs/ckeditor4/4.16.2/ckfinder/ckfinder.js"></script>

<script>

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


