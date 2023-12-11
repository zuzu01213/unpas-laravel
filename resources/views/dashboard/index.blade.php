@extends('dashboard.layouts.main')

@section('container')
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>

    <div class="align-items-center">

        @if(auth()->user()->is_admin)
            <span class="badge bg-danger text-dark me-2 p-2" style="font-size: 16px;">Admin Member</span>
        @elseif(auth()->user()->is_premium)
            <span class="badge bg-warning text-dark me-2 p-2" style="font-size: 16px;">Premium Member</span>
        @elseif( auth()->user()->posts_limit <= 1)
        <span class="badge bg-secondary text-dark me-2 p-2" style="font-size: 16px;">Basic Member</span>
        <span class="badge bg-secondary text-dark me-2 p-2" style="font-size: 16px;">Limited only 1 post</span>
            @else
            <span class="badge bg-secondary text-dark me-2 p-2" style="font-size: 16px;">Basic Member</span>
        @endif

    </div>
</div>
@endsection


