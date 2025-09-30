<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.pages.supplier.add-supplier');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|digits:10',
            'address' => 'required|string'
        ]);

        $supplier = Supplier::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address']
        ]);

        return redirect()->route('addSupplier')->with('success', 'Supplier added successfully');
    }
}
