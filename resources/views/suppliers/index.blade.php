@extends('layouts.app')

@section('page-title', 'Suppliers')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-truck"></i></div>
            <div>
                <div class="stat-label">Total Suppliers</div>
                <div class="stat-value">{{ $suppliers->count() }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card-navy">
    <div class="card-header-navy">
        <h5><i class="bi bi-truck me-2" style="color:var(--gold)"></i>Supplier Directory</h5>
        <span class="header-count">{{ $suppliers->count() }} records</span>
    </div>
    <hr class="gold-divider">
    <table class="table table-navy">
        <thead>
            <tr>
                <th>Supplier Code</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $supplier)
            <tr>
                <td><span class="badge-gold">{{ $supplier->supplier_code }}</span></td>
                <td>{{ $supplier->contact_email }}</td>
                <td>{{ $supplier->contact_number }}</td>
                <td>
                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn-gold">
                        <i class="bi bi-eye"></i> View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p>No suppliers found.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection