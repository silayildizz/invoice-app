<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Sıfırlama</title>
</head>
<body>
    <h1>{$text}</h1>

    <p>Merhaba,</p>

    <p>
        Şifrenizi sıfırlamak için aşağıdaki bağlantıya tıklayın:
        <br>
        <a href="{{ $resetUrl }}">Şifreyi Sıfırla</a>
    </p>

    <p>
        Bu bağlantı <strong>{{ $expires->diffForHumans() }}</strong> süresince geçerlidir.
    </p>

    <p>Teşekkürler,<br>{{ config('app.name') }}</p>
</body>
</html>
