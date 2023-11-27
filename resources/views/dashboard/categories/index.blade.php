@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories </h1>
</div>

@if (session()->has('success'))
<div class="alert alert-dark" role="alert">
    {{session('success')}}
</div>
@endif

<div class="table-responsive small col-lg-12  ">
    <a href="/dashboard/categories/create" class="btn btn-dark mb-3">Create new category</a>
    <table class="table custom-table-style">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>

                <th scope="col" style="padding-left: 88px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>

                <td class="between">
                    <a href="/dashboard/categories/{{ $category->slug }}" class="action-link">
                        <i class="bi bi-eye"></i> View
                    </a>
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="action-link" style="background-color: #2C3E50;">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" style="display: inline;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="action-btn" onclick="return confirm('Are you sure')">
                            <i class="bi bi-x-circle"></i> Delete
                        </button>
                    </form>
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
        background-color: #E74C3C; /* Adjust as needed */
    }
</style>
