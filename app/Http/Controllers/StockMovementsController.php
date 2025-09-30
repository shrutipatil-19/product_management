<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\stock_movements;
use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockMovementsController extends Controller
{
    public function stockIn()
    {
        $products = StockIn::get();
        return view('admin.pages.stock-movement.stock-in', compact('products'));
    }

    public function addStockIn()
    {
        $products = Product::get();
        $suppliers = Supplier::get();
        return view('admin.pages.stock-movement.add-stock-in', compact('products', 'suppliers'));
    }

    public function createStockIn(Request $request)
    {
        $validate = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'supplier_id'  => 'nullable|exists:suppliers,id',
            'quantity'     => 'required|integer|min:1',
            'reference_no' => 'nullable|string|max:255',
            'notes'        => 'nullable|string',
        ]);

        $sockIn = StockIn::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'reference_no' => $request->reference_no,
            'notes' => $request->notes
        ]);
        $product = Product::find($request->product_id);
        $product->quantity += $request->quantity;
        $product->save();

        stock_movements::create([
            'product_id'   => $request->product_id,
            'user_id'      => auth::id(),
            'type'         => 'in',
            'quantity'     => $request->quantity,
            'reference_no' => $request->reference_no,
            'notes'        => $request->notes,
        ]);
        return redirect()->route('addStockIn')->with('success', 'Stock in added successfully');
    }

    public function listStockOut()
    {
        $stockOuts = StockOut::get();
        return view('admin.pages.stock-movement.stock-out.list-stock', compact('stockOuts'));
    }
    public function addStockOut()
    {
        $products = Product::get();
        $customers = Customer::get();
        return view('admin.pages.stock-movement.stock-out.add-stock-out', compact('products', 'customers'));
    }
    public function storeStockOut(Request $request)
    {
        $validate = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'reason' => 'required|in:sale,return,damage,transfer',
            'quantity'     => 'required|integer|min:1',
            'reference_no' => 'nullable|string|max:255',
            'notes' => 'nullable'
        ]);
        $stockOut = StockOut::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'reference_no' => $request->reference_no,
            'notes' => $request->notes
        ]);
        $product = Product::findOrFail($request->product_id);
        // $product->quantity -= $request->quantity;
        if ($product->quantity < $validate['quantity']) {
            return back()->withErrors(['quantity' => 'Not enough stock available. Current stock: ' . $product->quantity]);
        }
        $product->save();

        stock_movements::create([
            'product_id'   => $request->product_id,
            'user_id'      => auth::id(),
            'type'         => 'out',
            'quantity'     => $request->quantity,
            'reference_no' => $request->reference_no,
            'notes'        => $request->notes,
        ]);
        return redirect()->route('addStockOut')->with('success', 'Stock Out added successfully');
    }
}
