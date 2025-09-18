@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow rounded-4 border-0 invoice-print-area p-4" style="max-width: 800px; margin: auto;">

        {{-- Şirket Bilgileri + Logo --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 60px; margin-right: 15px;">
                <div>
                    <h2 class="fw-bold text-primary mb-0">My Company Ltd.</h2>
                    <p class="mb-1">123 Business St., City, Country</p>
                    <p class="mb-0">Phone: +123 456 7890</p>
                    <p>Email: info@mycompany.com</p>
                </div>
            </div>

            <div class="text-end">
                <h4 class="fw-bold">INVOICE</h4>
                <p class="mb-1">#{{ $invoices->invoice_number }}</p>
                <p>Date: {{ $invoices->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <hr>

        {{-- Müşteri Bilgileri --}}
        <div class="mb-4">
            <h5 class="fw-semibold mb-2">Bill To:</h5>
            <p class="mb-1">{{ $invoices->customer }}</p>
            <p class="mb-1">{{ $invoices->email }}</p>
        </div>

        {{-- Fatura Detayları --}}
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Description</th>
                    <th class="text-end">Amount ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoices->type }} Invoice</td>
                    <td class="text-end">${{ number_format($invoices->amount, 2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th class="text-end">${{ number_format($invoices->amount, 2) }}</th>
                </tr>
            </tfoot>
        </table>

        {{-- Durum --}}
        <div class="mb-4">
            <strong>Status:</strong> 
            <span class="badge bg-{{ strtolower($invoices->status) === 'paid' ? 'success' : 'warning' }}">
                {{ ucfirst($invoices->status) }}
            </span>
        </div>

        {{-- Butonlar (Yazdırma görünümünde yok) --}}
        <div class="d-flex justify-content-between no-print">
            <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">
                🔙 Back to List
            </a>
            <button class="btn btn-primary" onclick="window.print()">🖨️ Print Invoice</button>
        </div>
    </div>
</div>

{{-- Yazdırma için özel stiller --}}
<style>
@media print {
    body * {
        visibility: hidden;
    }

    .invoice-print-area,
    .invoice-print-area * {
        visibility: visible;
    }

    .invoice-print-area {
        position: absolute;
        top: 0;
        left: 0;
        width: 210mm;
        height: auto;
        padding: 20mm;
        background: white;
        box-sizing: border-box;
        font-size: 12pt;
    }

    .no-print {
        display: none !important;
    }

    table {
        page-break-inside: avoid;
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
    }
}
</style>
@endsection




