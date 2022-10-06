@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('home.partials.sidebar')
            </div>
            <div class="col-8">
                <h2>New Post</h2>
                <form action="{{ route('home.savePost') }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="title" class="form-control"><br>
                    <textarea name="body" cols="30" rows="10" placeholder="body" class="form-control"></textarea><br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
