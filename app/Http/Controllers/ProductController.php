<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $suppliers = $product->suppliers;
        return view('products.show', compact('product', 'suppliers'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code',
            'product_name' => 'required',
            'price'        => 'required|numeric|min:0',
        ]);

        Product::create([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'price'        => $request->price,
            'current_stock'=> 0,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product added successfully!');
    }
}