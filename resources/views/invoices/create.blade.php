@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <h2 class="mb-4 fw-bold text-primary">📝 Create New Invoice</h2>

            {{-- Hata mesajları --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Fatura oluşturma formu --}}
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="invoice_number" class="form-label fw-semibold">Invoice Number</label>
                        <input type="text" id="invoice_number" name="invoice_number" class="form-control shadow-sm" required>
                    </div>

                    <div class="col-md-6">
                        <label for="customer" class="form-label fw-semibold">Customer</label>
                        <input type="text" id="customer" name="customer" class="form-control shadow-sm" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control shadow-sm" required>
                    </div>

                    <div class="col-md-6">
                        <label for="amount" class="form-label fw-semibold">Amount ($)</label>
                        <input type="number" step="0.01" id="amount" name="amount" class="form-control shadow-sm" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select id="status" name="status" class="form-select shadow-sm" required>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                            <option value="Partial">Partial</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="type" class="form-label fw-semibold">Invoice Type</label>
                        <select id="type" name="type" class="form-select shadow-sm" required>
                            <option value="">Select</option>
                            <option value="Water">Water</option>
                            <option value="Internet">Internet</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">
                        🔙 Back
                    </a>
                    <button type="submit" class="btn btn-success shadow-sm">
                        💾 Create Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


