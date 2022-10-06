@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('home.partials.sidebar')
            </div>
            <div class="col-5">
                <h2>Post</h2>
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ \App\Models\User::find($post->user_id)->name }} (Author)</h6>
                        <p class="card-text">{{ $post->body }}</p>
                        <a href="" class="card-link text-decoration-none text-dark">Comments <span>{{$post->comments->count() }}</span></a>
                    </div>
                </div>
                @if(auth()->user()->id !== $post->user_id)
                    <div class="border-top border-bottom p-2">
                        <a href="{{ route('showCommentForm',['id'=>$post->id]) }}" class="text-decoration-none text-dark">Comment</a>
                    </div>
                @endif
            </div>
            <div class="col-3">
                <h5>All Comments</h5>
                @foreach($all_comments as $comment)
                    <div class="card m-2" style="width: 25rem;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">{{ \App\Models\User::find($comment->user_id)->name }}</h6>
                            <p class="card-text text-muted">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


