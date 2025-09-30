@extends('frontend.layout.app')

@section('content')
<div class="container">
    <h2>Pay Now</h2>

    <form action="{{ route('razorpay.callback') }}" method="POST">
        @csrf
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ $key }}"
            data-amount="{{ $amount }}"
            data-currency="INR"
            data-order_id="{{ $razorpayOrder['id'] }}"
            data-buttontext="Pay Now"
            data-name="My Shop"
            data-description="Product Payment"
            data-prefill.name="{{ $order->name }}"
            data-prefill.email="{{ $order->email }}"
            data-prefill.contact="{{ $order->phone }}"
            data-theme.color="#3399cc">
        </script>
        <input type="hidden" name="order_id" value="{{ $razorpayOrder['id'] }}">
    </form>
</div>
@endsection
