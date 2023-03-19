@extends('layout.admin')

@section('content')
    <h1>Categories</h1>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Name</th>
            <th width="65%">Description</th>
            <th></th>
            <th></th>
        </tr>
        @include('admin.category.part.items', ['items' => $roots, 'level' => -1])
    </table>
@endsection
