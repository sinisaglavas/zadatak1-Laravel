@extends('layouts.master')

@section('main')
    <h1 class="pt-2">All Posts</h1>
    <div class="row">
        <div class="col-6">
            @foreach($all_posts as $post)
                <div class="card m-2" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><a href="{{ route('singlePost',['id'=>$post->id]) }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ \App\Models\User::find($post->user_id)->name }} (Author)</h6>
                        <a href="{{ url('/single-post/show-comments',['id'=>$post->id]) }}" class="card-link text-decoration-none text-dark">Comments <span>{{$post->comments->count() }}</span></a>
                    </div>
                </div><br>
            @endforeach
        </div>
    </div>
@endsection
