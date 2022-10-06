@extends('layouts.app')

@section('content')

        @if(isset(\Illuminate\Support\Facades\Auth::user()->id))
        <div class="container">
            <div class="row">
                <div class="col-4">
                    @include('home.partials.sidebar')
                </div>
                <div class="col-5">
                    <h2>Post</h2>
                    <div class="card m-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $single_post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ \App\Models\User::find($single_post->user_id)->name }} (Author)</h6>
                            <p class="card-text">{{ $single_post->body }}</p>
                            <a href="{{ route('showComments',['id'=>$single_post]) }}" class="card-link text-decoration-none text-dark">Comments <span>{{$single_post->comments->count() }}</span></a>
                        </div>
                    </div>
                    @if(auth()->user()->id !== $single_post->user_id)
                    <div class="border-top border-bottom p-2">
                        <a href="{{ route('showCommentForm',['id'=>$single_post->id]) }}" class="text-decoration-none text-dark">Comment</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2>Post</h2>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $single_post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ \App\Models\User::find($single_post->user_id)->name }} (Author)</h6>
                                <p class="card-text">{{ $single_post->body }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


@endsection
