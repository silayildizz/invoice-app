<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Fatura Yönetimi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">FaturaApp</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                   </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- sayfaya özgü içerik buraya gelir --}}
        @yield('content')
    </div>

    <footer class="text-center mt-4">
        <small>&copy; {{ date('Y') }} Fatura Yönetimi</small>
    </footer>
</body>
</html>
