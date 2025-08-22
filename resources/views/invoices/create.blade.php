@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Invoice</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="invoice_number" class="form-label">Invoice Number</label>
            <input type="text" class="form-control" name="invoice_number" required>
        </div>

        <div class="mb-3">
            <label for="customer" class="form-label">Customer</label>
            <input type="text" class="form-control" name="customer" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" name="amount" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="Unpaid">Unpaid</option>
                <option value="Paid">Paid</option>
                <option value="Partial">Partial</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
