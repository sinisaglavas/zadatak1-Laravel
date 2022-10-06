@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
           @include('home.partials.sidebar')
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <h2>My Posts</h2>
            <ul class="list-group">
                @foreach($all_posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('home.singlePost',['id'=>$post->id]) }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
