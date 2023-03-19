@extends('layout.admin')

@section('content')
    <h1>Control Panel</h1>
    <p>Hello, {{ auth()->user()->name }}!</p>
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Log out</button>
    </form>
@endsection
