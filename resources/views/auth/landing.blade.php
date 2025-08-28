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
  <title>Giriş Yap</title>
</head>

<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-4 text-center">Log in</h3>

            {{-- Flash / durum mesajları --}}
            @if (session('login') === 'fail')
              <div class="alert alert-danger" role="alert">Giriş bilgilerin hatalı.</div>
            @endif
            @if (session('status'))
              <div class="alert alert-info" role="alert">{{ session('status') }}</div>
            @endif


            {{-- GİRİŞ FORMU --}}
            <form method="POST" action="{{ route('login.post') }}" novalidate>
              @csrf

              <div class="form-outline mb-4">
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control form-control-lg @error('email') is-invalid @enderror"
                  required
                />
                <label class="form-label" for="email">Email</label>
                @error('email')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-outline mb-3">
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control form-control-lg @error('password') is-invalid @enderror"
                />
                <label class="form-label" for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                <label class="form-check-label ms-2" for="remember">Beni hatırla</label>
              </div>

              <button class="btn btn-primary btn-lg w-100" type="submit">
                Login
              </button>
            </form>

  
        <div>
            <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                Şifremi unuttum?
            </a>
        </div>


            <hr class="my-4">

            <div class="d-grid gap-2">
              <a class="btn btn-outline-primary btn-lg w-100" href="{{ route('register') }}">
                <i class="fa-solid fa-user-plus me-2"></i> Register
              </a>
              {{-- Sosyal giriş eklemek istersen, route/veriyi burada bağlayabilirsin --}}
              {{-- <a class="btn btn-lg w-100 btn-primary" style="background-color:#dd4b39" href="{{ route('auth.google.redirect') }}">
                  <i class="fab fa-google me-2"></i> Google ile Giriş
              </a> --}}
            </div>

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
