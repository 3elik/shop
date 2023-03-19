@extends('layout.admin')

@section('content')
    <h1>Category</h1>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Name:</strong> {{ $category->name }}</p>
            <p><strong>Slug:</strong> {{ $category->slug }}</p>
            <p><strong>Description:</strong></p>
            @isset($category->content)
                <p>{{ $category->content }}</p>
            @else
                <p><em>No description</em></p>
            @endif
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/600x200" alt="" class="img-fluid">
        </div>
    </div>
    @if ($category->children->count())
        <h3>Children categories</h3>
        <table class="table table-bordered">
            <tr>
                <th width="30%">Name</th>
                <th width="65%">Description</th>
                <th></th>
                <th></th>
            </tr>
            @include('admin.category.part.items', ['items' => $category->children, 'level' => -1])
        </table>
    @else
        <h3><em>No children categories</em></h3>
    @endif
    <form action="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
        method="post"
    >
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            Delete Category
        </button>
    </form>
@endsection
