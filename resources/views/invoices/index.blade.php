@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📄 Invoice List</h2>
        <a href="{{ route('invoices.create') }}" class="btn btn-success shadow-sm">
            + New Invoice
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead class="table-dark text-white rounded-top">
                    <tr>
                        <th>🧾 Invoice Number</th>
                        <th>👤 Customer</th>
                        <th>💰 Amount</th>
                        <th>📌 Status</th>
                        <th>📂 Type</th>
                        <th class="text-end pe-4">⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr class="align-middle">
                            <td class="fw-semibold">{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->customer }}</td>
                            <td class="text-success">${{ number_format($invoice->amount, 2) }}</td>
                            <td>
                                <span class="badge rounded-pill bg-{{ $invoice->status === 'paid' ? 'success' : 'warning' }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted text-capitalize">{{ $invoice->type ?? '—' }}</span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-outline-primary btn-sm me-1">
                                    🔍 View
                                </a>

                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure to delete this invoice?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted py-4">
                                🙁 No invoices found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


