@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Invoice #{{ $invoice->invoice_number }}</h2>
    <p><strong>Customer:</strong> {{ $invoice->customer }}</p>
    <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
    <p><strong>Status:</strong> {{ $invoice->status }}</p>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
