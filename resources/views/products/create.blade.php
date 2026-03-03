@extends('layouts.app')

@section('page-title', 'Add Product')

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
                <h5><i class="bi bi-plus-circle me-2" style="color:var(--gold)"></i>New Product</h5>
            </div>
            <hr class="gold-divider">
            <div class="p-4 form-navy">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Product Code</label>
                        <input type="text"
                               name="product_code"
                               class="form-control"
                               value="{{ old('product_code') }}"
                               placeholder="e.g. P001">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Product Name</label>
                        <input type="text"
                               name="product_name"
                               class="form-control"
                               value="{{ old('product_name') }}"
                               placeholder="e.g. Bottled Water">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Price (₱)</label>
                        <input type="number"
                               name="price"
                               class="form-control"
                               step="0.01"
                               min="0"
                               value="{{ old('price') }}"
                               placeholder="e.g. 15.00">
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn-gold">
                            <i class="bi bi-check-circle"></i> Save Product
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