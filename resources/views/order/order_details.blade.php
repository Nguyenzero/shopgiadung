@extends('main')

@section('content')
    <div class="container mt-5" style="margin-top: 200px; margin-bottom: 100px;">
        @if(!$order)
            <p>No order details found. Please log in to view your order details.</p>
        @else
            <h3>Products</h3>
            <table class="table" style="margin-top: 70px;">
                <thead>
                    <tr>
                        <th>IMG</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->carts as $cart)
                        <tr>
                            <td><img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px"></td>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ number_format($cart->price, 0, '', '.') }}</td>
                            <td>{{ $cart->pty }}</td>
                            <td>{{ number_format($cart->price * $cart->pty, 0, '', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td>{{ number_format($order->carts->sum(function($cart) { return $cart->price * $cart->pty; }), 0, '', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection