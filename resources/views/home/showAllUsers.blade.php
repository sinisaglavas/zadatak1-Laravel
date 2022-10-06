@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('home.partials.sidebar')
            </div>
            <div class="col-8">
                <h2>All Users</h2>
                <ul class="list-group">
                    @foreach($all_users as $user)
                        <li class="list-group-item">
                            <a href="{{ route('home.showSingleUser',['id'=>$user->id]) }}" class="text-decoration-none text-dark text-uppercase">{{ $user->name }}</a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection
