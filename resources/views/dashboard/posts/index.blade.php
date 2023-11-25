@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All your posts, {{ auth()->user()->name }}</h1>
</div>

<div class="table-responsive small col-lg-8 ">
    <a href="/dashboard/posts/create" class="btn btn-dark mb-3">Create new post</a>
        <table class="table custom-table-style">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="/dashboard/posts/{{$post->slug}}" style="color: brown; margin-right: 10px; padding: 5px; border-radius: 5px;">
                        <i class="bi bi-eye" style="font-size: 1.5em;"></i>
                    </a>
                    <a href="/dashboard/posts/{{$post->slug}}" style="color: brown; margin-right: 10px; padding: 5px; border-radius: 5px;">
                        <i class="bi bi-pencil-square" style="font-size: 1.5em;"></i>
                    </a>
                    <a href="/dashboard/posts/{{$post->slug}}" style="color: brown; margin-right: 10px; padding: 5px; border-radius: 5px; ">
                        <i class="bi bi-x-circle" style="font-size: 1.5em;"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<style>
    .custom-table-style {
    background-color: #000000;
}
</style>
