@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('home.partials.sidebar')
            </div>
            <div class="col-8">
                <h2>My Post</h2>
                <div class="card m-2" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $single_post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ \App\Models\User::find($single_post->user_id)->name }} (Author)</h6>
                        <p class="card-text">{{ $single_post->body }}</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
