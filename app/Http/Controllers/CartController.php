<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    protected $userId = 1;

    // public function index()
    // {
    //     $sessionCart = session()->get('cart', []);
    //     $subtotal = collect($sessionCart)->sum(fn($item) => $item['price'] * $item['quantity']);

    //     return view('frontend/pages/cart', ['cart' => $sessionCart, 'subtotal' => $subtotal]);
    // }
    public function index()
    {
        $cart = session()->get('cart', []); // always an array
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('frontend/pages/cart', compact('cart', 'subtotal'));
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $sessionCart = session()->get('cart', []);
        $images = json_decode($product->image, true);
        $firstImage = $images[0] ?? null;

        if (isset($sessionCart[$id])) {
            $sessionCart[$id]['quantity']++;
        } else {
            $sessionCart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $firstImage,
            ];
        }
        session()->put('cart', $sessionCart);

        $dbCart = Cart::firstOrNew([
            'user_id' => $this->userId,
            'product_id' => $id
        ]);

        $dbCart->quantity = $dbCart->exists ? $dbCart->quantity + 1 : 1;
        $dbCart->price = $product->price;
        $dbCart->save();

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $sessionCart = session()->get('cart', []);
        if (isset($sessionCart[$id])) {
            $sessionCart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $sessionCart);
        }

        $dbCart = Cart::where('user_id', $this->userId)->where('product_id', $id)->first();
        if ($dbCart) {
            $dbCart->quantity = $request->quantity;
            $dbCart->save();
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function removeFromCart($id)
    {

        $sessionCart = session()->get('cart', []);
        if (isset($sessionCart[$id])) {
            unset($sessionCart[$id]);
            session()->put('cart', $sessionCart);
        }

        Cart::where('user_id', $this->userId)->where('product_id', $id)->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
