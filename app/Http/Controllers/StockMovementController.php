<?php

namespace App\Http\Controllers;

use App\Models\stock_movements;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $products = stock_movements::with(['product', 'user'])->latest()->get();
        return view('admin.pages.stock-movement.stock-movement', compact('products'));
    }
}
