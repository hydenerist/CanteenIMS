@extends('layouts.app')

@section('page-title', $supplier->supplier_code)

@section('content')

<div class="detail-header">
    <div class="detail-icon"><i class="bi bi-truck"></i></div>
    <div>
        <h2>{{ $supplier->supplier_code }}</h2>
        <div class="detail-meta">
            <div class="meta-item"><i class="bi bi-envelope"></i> <span>{{ $supplier->contact_email }}</span></div>
            <div class="meta-item"><i class="bi bi-telephone"></i> <span>{{ $supplier->contact_number }}</span></div>
        </div>
    </div>
</div>

<div class="card-navy">
    <div class="card-header-navy">
        <h5><i class="bi bi-box-seam me-2" style="color:var(--gold)"></i>Products Supplied</h5>
        <span class="header-count">{{ $products->count() }} products</span>
    </div>
    <hr class="gold-divider">
    <table class="table table-navy">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity Delivered</th>
                <th>Delivery Reference</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td><span class="badge-gold">{{ $product->product_code }}</span></td>
                <td><span class="badge-teal">{{ $product->pivot->quantity }} units</span></td>
                <td>{{ $product->pivot->delivery_reference }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No products supplied yet.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    <a href="{{ route('suppliers.index') }}" class="btn-outline-navy">
        <i class="bi bi-arrow-left"></i> Back to Suppliers
    </a>
</div>

@endsection