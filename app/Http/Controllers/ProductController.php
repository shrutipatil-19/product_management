<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.pages.products.addProject');
    }

    public function create(Request $request)
    {

        $validate = $request->validate([
            'name'        => 'required|string|max:255',
            'sku'         => 'required|string|max:100|unique:products,sku',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:1',
            'image'       => 'nullable|array',
            'image.*'     => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('products', 'public');
        // }
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $path = $img->store('products', 'public');
                $imagePaths[] = $path;
            }
        }

        $product = Product::create([
            'name'        => $request->name,
            'sku'         => $request->sku,
            'description' => $request->description,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'image'       => !empty($imagePaths) ? json_encode($imagePaths) : json_encode([]), // save [] instead of null
        ]);


        return redirect()->route('listProduct');
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Product created successfully',
        //     'data'    => $product,
        // ], 201);
    }

    public function list()
    {
        $products = Product::all();

        return view('admin.pages.products.listProject', compact('products'));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Product list fetched successfully',
        //     'data'    => $products
        // ], 200);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.pages.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku'         => 'required|string|max:100|unique:products,sku,' . $id,
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'image.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $images = json_decode($product->image, true) ?? [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $path = $img->store('products', 'public');
                $images[] = $path;
            }
        }

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'sku'         => $request->sku,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'image'       => json_encode($images),
        ]);

        return redirect()->route('productList')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // delete images from storage
        if ($product->image) {
            foreach (json_decode($product->image, true) as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $product->delete();

        return redirect()->route('productList')->with('success', 'Product deleted successfully!');
    }
}
