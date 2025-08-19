@extends('layouts.app')

@section('title','Yeni Müşteri')

@section('content')
  <h1>Yeni Müşteri Ekle</h1>

  <form method="POST" action="{{ route('customers.store') }}">
    @csrf

    <div class="mb-3">
      <label>Ad</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
      <label>Telefon</label>
      <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
      <label>Adres</label>
      <textarea name="address" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Kaydet</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Geri</a>
  </form>
@endsection
