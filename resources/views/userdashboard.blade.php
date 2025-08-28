@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-end mb-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Çıkış</button>
        </form>
    </div>

    <div class="row g-4">
        <!-- Card 1: Total Invoices -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">🧾 Total Invoices</h5>
                    <p class="display-6 fw-bold">{{ $totalInvoices }}</p>
                </div>
            </div>
        </div>

        <!-- Card 2: Paid Invoices -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title text-success fw-bold">💸 Payments</h5>
                    <p class="display-6 fw-bold text-success">{{ $paidInvoices }}</p>
                </div>
            </div>
        </div>

        <!-- Card 3: Pending Payments -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title text-warning fw-bold">⏳ Oustanding payments</h5>
                    <p class="display-6 fw-bold text-warning">{{ $pendingInvoices }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Invoices Table -->
    <div class="card mt-5 shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h4 class="mb-4 fw-bold text-primary">🕘 Last Payments</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Müşteri</th>
                            <th>Tutar</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th></th> <!-- Pay button column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentInvoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->customer }}</td>
                            <td>${{ number_format($invoice->amount, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $invoice->status === 'paid' ? 'success' : 'warning' }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                            <td>{{ $invoice->created_at->format('d M Y') }}</td>
                            <td>
                                @if($invoice->status !== 'paid')
                                    <form action="{{ route('invoices.pay', $invoice->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">Pay</button>
                                    </form>
                                @else
                                    <span class="text-muted">✔️</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                        @if($recentInvoices->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-muted">Fatura bulunamadı.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
