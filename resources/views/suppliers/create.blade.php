@extends('layouts.app')

@section('page-title', 'Add Supplier')

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
                <h5><i class="bi bi-plus-circle me-2" style="color:var(--gold)"></i>New Supplier</h5>
            </div>
            <hr class="gold-divider">
            <div class="p-4 form-navy">
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Supplier Code</label>
                        <input type="text"
                               name="supplier_code"
                               class="form-control"
                               value="{{ old('supplier_code') }}"
                               placeholder="e.g. S001">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Contact Email</label>
                        <input type="email"
                               name="contact_email"
                               class="form-control"
                               value="{{ old('contact_email') }}"
                               placeholder="e.g. supplier@email.com">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Contact Number</label>
                        <input type="text"
                               name="contact_number"
                               class="form-control"
                               value="{{ old('contact_number') }}"
                               placeholder="e.g. 09171234567">
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn-gold">
                            <i class="bi bi-check-circle"></i> Save Supplier
                        </button>
                        <a href="{{ route('suppliers.index') }}" class="btn-outline-navy">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection