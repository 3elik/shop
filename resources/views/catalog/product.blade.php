@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="https://via.placeholder.com/400x400"
                                 alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <p>Price: {{ number_format($product->price, 2, '.', '') }}</p>
                            <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="POST"
                                  class="form-inline">
                                @csrf
                                <label for="input-quantity">Quantity</label>
                                <input type="text" name="quantity" id="input-quantity" value="1"
                                       class="form-control mx-2 w-25">
                                <button type="submit" class="btn btn-success">Add to basket</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mt-4 mb-0">{{ $product->content }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            Category:
                            <a href="{{ route('catalog.category', ['slug' => $product->category->slug]) }}">
                                {{ $product->category->name }}
                            </a>
                        </div>
                        <div class="col-md-6 text-right">
                            Brand:
                            <a href="{{ route('catalog.brand', ['slug' => $product->brand->slug]) }}">
                                {{ $product->brand->name }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
