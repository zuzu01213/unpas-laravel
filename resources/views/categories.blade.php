@extends('layouts.main')

@section('container')
 <h1 class="mb-5">Post Categories</h1>


@foreach ($categories as $category)
    <ul>
        <li>
            <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</h2></a>
        </li>
    </ul>

<style>
  body {
    background-color: blanchedalmond;
    text-align: center
  }
  a {
    text-decoration-color: rebeccapurple;
    color: green
  }
  h2 {
    color: blanchedalmond
  }
  ul{
    list-style-type: none;
  }
</style>
</article>
@endforeach

@endsection
