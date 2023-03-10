@extends('layout.site')

@section('content')
    <h1>Catalog</h1>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ducimus, eligendi
        exercitationem expedita, iure iusto laborum magnam qui quidem repellat similique
        tempora tempore ullam! Deserunt doloremque impedit quis repudiandae voluptas?
    </p>

    <h2>Catalog sections</h2>
    <div class="row">
        @foreach ($categories as $category)
            @include('catalog.part.category', ['category' => $category])
        @endforeach
    </div>
@endsection
