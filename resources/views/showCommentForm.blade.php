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
{{--                            <a href="" class="card-link text-decoration-none text-dark">Comments <span>{{$post->comments->count() }}</span></a>--}}
                            <a href="{{ route('showComments',['id'=>$post]) }}" class="card-link text-decoration-none text-dark">Comments <span>{{$post->comments->count() }}</span></a>

                        </div>
                    </div>
                    <div class="border-top border-bottom p-2">
                        <a href="" class="text-decoration-none text-dark">Comment</a>
                    </div>
                    <form action="{{ route('saveComment',['id'=>$post->id]) }}" method="POST" class="p-2">
                        @csrf
                        <textarea name="body" placeholder="write a comment" class="form-control" rows="5" required></textarea><br>
                        <button type="submit" class="btn btn-primary form-control">Save</button>
                    </form>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
  @endsection

