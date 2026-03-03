@extends('layouts.app')

@section('page-title', 'Products')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            <div>
                <div class="stat-label">Total Products</div>
                <div class="stat-value">{{ $products->count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-stack"></i></div>
            <div>
                <div class="stat-label">Total Stock Units</div>
                <div class="stat-value">{{ $products->sum('current_stock') }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-truck"></i></div>
            <div>
                <div class="stat-label">Total Suppliers</div>
                <div class="stat-value">{{ \App\Models\Supplier::count() }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card-navy">
    <div class="card-header-navy">
        <h5><i class="bi bi-box-seam me-2" style="color:var(--gold)"></i>Product Inventory</h5>
        <span class="header-count">{{ $products->count() }} records</span>
    </div>
    <hr class="gold-divider">
    <table class="table table-navy">
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Current Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td><span class="badge-gold">{{ $product->product_code }}</span></td>
                <td>{{ $product->product_name }}</td>
                <td>₱{{ number_format($product->price, 2) }}</td>
                <td><span class="badge-teal">{{ $product->current_stock }} units</span></td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn-gold">
                        <i class="bi bi-eye"></i> View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No products found.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection