@extends('layouts.app')

@section('content')
<a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">+ New Invoice</a>

<div class="container">
    <h2>Invoices</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->customer }}</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td><a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary btn-sm">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
