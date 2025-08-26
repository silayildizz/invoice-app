@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body px-5 py-4">
            <h2 class="mb-4 fw-bold text-primary">
                🧾 Invoice #{{ $invoices->invoice_number }}
            </h2>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between">
                    <strong>👤 Customer:</strong>
                    <span>{{ $invoices->customer }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong>💰 Amount:</strong>
                    <span class="text-success">${{ number_format($invoices->amount, 2) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong>📌 Status:</strong>
                    <span>
                        <span class="badge bg-{{ $invoices->status === 'paid' ? 'success' : 'warning' }}">
                            {{ ucfirst($invoices->status) }}
                        </span>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong>📂 Invoice Type:</strong>
                    <span class="text-capitalize">{{ $invoices->type ?? '—' }}</span>
                </li>
            </ul>

            <div class="text-end">
                <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">
                    🔙 Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

