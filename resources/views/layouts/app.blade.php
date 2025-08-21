<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Bootstrap 4 CSS --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <title>@yield('title','InvoiceApp')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <main class="container py-4">
    @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif
    @if($errors->any())
      <div class="alert alert-danger">@foreach($errors->all() as $e) <div>{{ $e }}</div> @endforeach</div>
    @endif

    @yield('content') {{-- Sayfa içerikleri buraya gelecek --}}
  </main>

</body>
</html>

