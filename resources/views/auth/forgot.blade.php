<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Şifremi Unuttum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:480px">
  <h3 class="mb-3">Şifremi Unuttum</h3>

  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
  @if(session('status'))  <div class="alert alert-success">{{ session('status') }}</div> @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">E-posta</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <button class="btn btn-primary w-100">Sıfırlama Linki Gönder</button>
  </form>
</div>
</body>
</html>
