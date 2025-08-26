@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">📊 Dashboard</h1>
        <p class="text-muted">Welcome back, {{ auth()->user()->name }} 👋</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Total Invoices</h5>
                    <h2 class="text-primary fw-bold">45</h2>
                    <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-outline-primary mt-2">View Invoices</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Unpaid</h5>
                    <h2 class="text-warning fw-bold">12</h2>
                    <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-outline-warning mt-2">Check Unpaid</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Paid</h5>
                    <h2 class="text-success fw-bold">33</h2>
                    <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-outline-success mt-2">View Paid</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
