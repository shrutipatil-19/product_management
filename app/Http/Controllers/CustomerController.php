<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.pages.customer.list-customer');
    }
    public function create()
    {
        return view('admin.pages.customer.add-customer');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|digits:10',
            'address' => 'required|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string'
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
        ]);

        return redirect()->route('listCustomer')->with('success', 'Customer added successfully');
    }
    public function list(){
        $customers = Customer::get();
        return view('admin.pages.customer.list-customer', compact('customers'));
    }
}
