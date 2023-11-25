@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap ">
    <h1>Create New Posts </h1>
</div>

<div class="col-lg-8 ">
<form method="post" action="/dashboard/posts">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug">
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id">
            @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <div id="editor"></div>
        <input type="hidden" name="body" id="body">
    </div>
    <button type="submit" class="btn btn-dark">Create Post</button>
</form>
</div>
<script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");
    const bodyInput = document.querySelector("#body");

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            editor.model.document.on( 'change:data', () => {
                bodyInput.value = editor.getData();
            });
        })
        .catch( error => {
            console.error( error );
        });
</script>

@endsection
