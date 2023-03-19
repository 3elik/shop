@extends('layout.site')

@section('content')
    <h1>Account</h1>
    <p>Hello, {{ auth()->user()->name }}</p>
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <button class="btn btn-primary">Log out</button>
    </form>
@endsection
