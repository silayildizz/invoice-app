<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Ekle</title>
</head>
<body>
 
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
 
@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
 
<form action="{{ route('kullanici.store') }}" method="POST">
    @csrf
    <label for="name">İsim:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required><br><br>
 
    <label for="email">E-posta:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required><br><br>
 
    <label for="password">Şifre:</label>
    <input type="password" id="password" name="password" required><br><br>
 
    <label for="password_confirmation">Şifre (Tekrar):</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>
 
    <button type="submit">Kaydet</button>
</form>
 
</body>
</html>
 
 