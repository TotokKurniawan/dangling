<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <p>Anda telah meminta untuk mereset password Anda. Klik tautan di bawah ini untuk mengatur ulang password Anda:</p>
    <a href="{{ url('/reset-password?token=' . $token) }}">Reset Password</a>
    <p>Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>
</body>
</html>

