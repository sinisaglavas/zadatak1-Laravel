@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('home.partials.sidebar')
            </div>
            <div class="col-8">
                <h2>Single User</h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        <button class="btn text-uppercase">{{ $single_user->name }}</button>
                        <button class="btn">{{ $single_user->email }}</button>
                    </li>
                </ul>

                @foreach($single_user_post as $post)
                <div class="card">
                    <div class="card-body">{{ $post->title }}</div>
                    <div class="card-body">{{ $post->body }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
