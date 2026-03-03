@extends('layouts.app')

@section('page-title', 'Add Stock Entry')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">

        @if($errors->any())
            <div class="alert-danger-navy mb-4">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <strong>Please fix the following errors:</strong>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-navy">
            <div class="card-header-navy">
                <h5><i class="bi bi-plus-circle me-2" style="color:var(--gold)"></i>New Stock Entry</h5>
            </div>
            <hr class="gold-divider">
            <div class="p-4 form-navy">
                <form action="{{ route('stock-entries.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Product</label>
                        <select name="product_id" class="form-select">
                            <option value="">— Select a Product —</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->product_name }} ({{ $product->product_code }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Supplier</label>
                        <select name="supplier_id" class="form-select">
                            <option value="">— Select a Supplier —</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->supplier_code }} — {{ $supplier->contact_email }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Quantity</label>
                        <input type="number"
                               name="quantity"
                               class="form-control"
                               min="1"
                               value="{{ old('quantity') }}"
                               placeholder="Enter quantity (min. 1)">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Delivery Reference</label>
                        <input type="text"
                               name="delivery_reference"
                               class="form-control"
                               value="{{ old('delivery_reference') }}"
                               placeholder="e.g. DR-0001">
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn-gold">
                            <i class="bi bi-check-circle"></i> Save Stock Entry
                        </button>
                        <a href="{{ route('products.index') }}" class="btn-outline-navy">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection