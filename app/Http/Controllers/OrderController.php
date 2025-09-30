<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $userId = 1;
    // public function createOrder(Request $request)
    // {
    //     $cartItems = Cart::where('user_id', $this->userId)->get();
    //     if ($cartItems->isEmpty()) {
    //         return redirect()->back()->with('error', 'Cart is empty');
    //     }

    //     $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);

    //     $order = Order::create([
    //         'user_id' => $this->userId,
    //         'total_amount' => $total,
    //         'status' => 'pending',
    //         'payment_method' => 'cod', // example
    //     ]);

    //     foreach ($cartItems as $item) {
    //         order_item::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item->product_id,
    //             'quantity' => $item->quantity,
    //             'price' => $item->price,
    //         ]);
    //     }

    //     // Clear cart
    //     Cart::where('user_id', $this->userId)->delete();
    //     session()->forget('cart');

    //     return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully!');
    // }
    public function createOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $order = Order::create([
            'user_id' => Auth::id() ?? 1,
            'total_amount' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
        ]);

        foreach ($cart as $productId => $item) {
            order_item::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }
        session()->forget('cart');

        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = Order::with('items.product')->where('user_id', $this->userId)->get();
        return view('frontend/pages/checkout', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('frontend/pages/checkout', compact('order'));
    }
}
