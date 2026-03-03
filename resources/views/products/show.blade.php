@extends('layouts.app')

@section('page-title', $product->product_name)

@section('content')

<div class="detail-header">
    <div class="detail-icon"><i class="bi bi-box-seam"></i></div>
    <div>
        <h2>{{ $product->product_name }}</h2>
        <div class="detail-meta">
            <div class="meta-item"><i class="bi bi-hash"></i> Code: <span>{{ $product->product_code }}</span></div>
            <div class="meta-item"><i class="bi bi-tag"></i> Price: <span>₱{{ number_format($product->price, 2) }}</span></div>
            <div class="meta-item"><i class="bi bi-stack"></i> Stock: <span>{{ $product->current_stock }} units</span></div>
        </div>
    </div>
</div>

<div class="card-navy">
    <div class="card-header-navy">
        <h5><i class="bi bi-clock-history me-2" style="color:var(--gold)"></i>Stock Delivery History</h5>
        <span class="header-count">{{ $suppliers->count() }} entries</span>
    </div>
    <hr class="gold-divider">
    <table class="table table-navy">
        <thead>
            <tr>
                <th>Supplier Code</th>
                <th>Quantity Delivered</th>
                <th>Delivery Reference</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $supplier)
            <tr>
                <td><span class="badge-gold">{{ $supplier->supplier_code }}</span></td>
                <td><span class="badge-teal">{{ $supplier->pivot->quantity }} units</span></td>
                <td>{{ $supplier->pivot->delivery_reference }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No stock entries yet.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    <a href="{{ route('products.index') }}" class="btn-outline-navy">
        <i class="bi bi-arrow-left"></i> Back to Products
    </a>
</div>

@endsection