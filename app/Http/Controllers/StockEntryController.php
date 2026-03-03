<?php

namespace App\Http\Controllers;

use App\Models\StockEntry;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('stock-entries.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        // Step 1: Validate the input
        $request->validate([
            'product_id'         => 'required|exists:products,id',
            'supplier_id'        => 'required|exists:suppliers,id',
            'quantity'           => 'required|integer|min:1',
            'delivery_reference' => 'required|unique:stock_entries,delivery_reference',
        ]);

        // Step 2: Create the stock entry
        StockEntry::create([
            'product_id'         => $request->product_id,
            'supplier_id'        => $request->supplier_id,
            'quantity'           => $request->quantity,
            'delivery_reference' => $request->delivery_reference,
        ]);

        // Step 3: Auto increase the product's current stock
        $product = Product::find($request->product_id);
        $product->increment('current_stock', $request->quantity);

        // Step 4: Redirect back with success message
        return redirect()->route('products.index')
                         ->with('success', 'Stock entry added successfully!');
    }
}