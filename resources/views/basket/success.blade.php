@extends('layout.site')

@section('content')
    <h1>Order is created</h1>

    <h2>Your order</h2>
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Cost</th>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price, 2, '.', '') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->cost, 2, '.', '') }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-end">Total</th>
            <th>{{ number_format($order->amount, 2, '.', '') }}</th>
        </tr>
    </table>

    <h2>Contact</h2>
    <p>Name: {{ $order->name }}</p>
    <p>Email: {{ $order->email }}</p>
    <p>Phone: {{ $order->phone }}</p>
    <p>Address: {{ $order->address }}</p>
    @isset($order->comment)
        <p>Comment: {{ $order->comment }}</p>
    @endisset
@endsection
