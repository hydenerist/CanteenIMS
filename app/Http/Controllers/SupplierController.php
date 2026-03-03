<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        $products = $supplier->products;
        return view('suppliers.show', compact('supplier', 'products'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_code'  => 'required|unique:suppliers,supplier_code',
            'contact_email'  => 'required|email|unique:suppliers,contact_email',
            'contact_number' => 'required',
        ]);

        Supplier::create([
            'supplier_code'  => $request->supplier_code,
            'contact_email'  => $request->contact_email,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier added successfully!');
    }
}