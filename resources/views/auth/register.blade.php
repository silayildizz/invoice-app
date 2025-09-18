<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
  <!-- MDB -->
  <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@9.1.0/css/mdb.min.css" rel="stylesheet"/>
  <title>Kayıt Ol</title>
</head>

<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-4 text-center">Register</h3>

            @if (session('register') === 'fail')
              <div class="alert alert-danger">Kayıt işlemi başarısız oldu.</div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
              @csrf
              

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required />
                <label class="form-label" for="name">Ad Soyad</label>
                @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required />
                <label class="form-label" for="email">Email</label>
                @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                       required />
                <label class="form-label" for="password">Şifre</label>
                @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg"
                       required />
                <label class="form-label" for="password_confirmation">Şifre (Tekrar)</label>
              </div>

              <button type="submit" class="btn btn-primary btn-lg w-100">Kayıt Ol</button>
            </form>

            <hr class="my-4">

            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg w-100">
              <i class="fa-solid fa-arrow-left me-2"></i> Giriş Ekranına Dön
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MDB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.1.0/mdb.umd.min.js" type="text/javascript"></script>
</body>
</html>
