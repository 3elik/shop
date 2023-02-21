@extends('layout.site')

@section('content')
    <h2>Your basket</h2>
    @if (count($products))
        @php
            $basketCost = 0;
        @endphp
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            @foreach($products as $product)
                @php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('catalog.product', [$product->slug]) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                    <td>
                        {{--                    <i class="fas fa-minus-square"></i>--}}
                        <span class="mx-1">{{ $itemQuantity }}</span>
                        {{--                    <i class="fas fa-plus-square"></i>--}}
                    </td>
                    <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                </tr>

            @endforeach
            <tr>
                <th colspan="4" class="text-right">Total</th>
                <th>{{ number_format($basketCost, 2, '.', '') }}</th>
            </tr>
        </table>
    @else
        <p>Basket is empty</p>
    @endif
@endsection
