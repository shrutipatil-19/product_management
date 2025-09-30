<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Order;

class PaymentController extends Controller
{
    // Show checkout form
    public function checkoutForm()
    {
        return view('frontend.pages.checkout-form');
    }

    // Create Razorpay order
    public function checkoutPayment(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $orderData = [
            'receipt'         => 'order_rcptid_' . time(),
            'amount'          => $request->amount * 100, // amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        // Save order in DB (optional)
        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'razorpay_order_id' => $razorpayOrder['id'],
            'status' => 'created',
        ]);

        return view('razorpay-checkout', [
            'order' => $order,
            'razorpayOrder' => $razorpayOrder,
            'key' => config('services.razorpay.key'),
            'amount' => $request->amount * 100
        ]);
    }

    // Handle callback
    public function callback(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $razorpayPaymentId = $request->razorpay_payment_id;
        $razorpayOrderId   = $request->razorpay_order_id;
        $razorpaySignature = $request->razorpay_signature;

        $order = Order::where('razorpay_order_id', $razorpayOrderId)->first();

        $generatedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, config('services.razorpay.secret'));

        if ($generatedSignature === $razorpaySignature) {
            $order->status = 'paid';
            $order->razorpay_payment_id = $razorpayPaymentId;
            $order->save();

            return redirect()->route('checkout.form')->with('success', 'Payment successful!');
        } else {
            $order->status = 'failed';
            $order->save();

            return redirect()->route('checkout.form')->with('error', 'Payment verification failed!');
        }
    }
}
