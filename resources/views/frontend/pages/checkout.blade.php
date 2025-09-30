@extends('frontend.layout.app')

@section('page-content')
<div class="container mx-auto p-6">

    <h2 class="text-2xl font-bold mb-4">Checkout</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

     @if(!empty($cart) && count($cart) > 0)
        <form action="{{ route('orders.create') }}" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Product</th>
                            <th class="p-2 border">Price</th>
                            <th class="p-2 border">Quantity</th>
                            <th class="p-2 border">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $item)
                        <tr class="text-center border-t">
                            <td class="p-2 flex items-center">
                                <img src="{{ $item['image'] }}" class="w-12 h-12 mr-2" alt="{{ $item['name'] }}">
                                {{ $item['name'] }}
                            </td>
                            <td class="p-2 border">₹{{ number_format($item['price'],2) }}</td>
                            <td class="p-2 border">{{ $item['quantity'] }}</td>
                            <td class="p-2 border">₹{{ number_format($item['price'] * $item['quantity'],2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <h3 class="text-xl font-bold">Total: ${{ number_format($subtotal,2) }}</h3>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Place Order
                </button>
            </div>
        </form>
    @else
        <p>Your cart is empty!</p>
    @endif
</div>
@endsection
