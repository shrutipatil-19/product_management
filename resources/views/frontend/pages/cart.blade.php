@extends('frontend.layout.app')

@section('page-content')

<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="container mt-4">
        <h2>Your Cart</h2>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(!empty($cart))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr>
                    <td>
                        @if($item['image'])
                        <img src="{{ url('storage/app/public/' . $item['image']) }}" width="60">
                        @endif
                    </td>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ $item['price'] * $item['quantity'] }}</td>
                    <td>
                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Your cart is empty.</p>
        @endif
    </div>
</section>
@endsection