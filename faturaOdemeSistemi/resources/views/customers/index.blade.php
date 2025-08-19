@extends('layouts.app') {{-- eğer layout kullanıyorsan, yoksa bunu kaldırabilirsin --}}

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Müşteri Listesi</h1>

    {{-- Başarılı işlem mesajı --}}
    @if(session('ok'))
        <div class="alert alert-success">
            {{ session('ok') }}
        </div>
    @endif

    {{-- Eğer hiç müşteri yoksa --}}
    @if($customers->isEmpty())
        <p>Henüz müşteri kaydı bulunmamaktadır.</p>
        <a href="{{ route(name: 'customers.create') }}" class="btn btn-primary">Yeni Müşteri Ekle</a>
    @else
        <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">+ Yeni Müşteri</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ad</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">Düzenle</a>

                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">
                                Sil
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

