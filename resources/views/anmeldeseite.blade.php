<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
    <link rel="stylesheet" href="{{ asset('css/anmeldeSeite.css') }}">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div>
            <label for="ab_name">Benutzername</label>
            <input type="text" id="ab_name" name="ab_name" required>
        </div>

        <div>
            <label for="ab_password">Passwort</label>
            <input type="password" id="ab_password" name="ab_password" required>
        </div>

        <button type="submit">Anmelden</button>
    </form>

    <p>Haben Sie noch keinen Account? <a href="{{ route('register') }}">Jetzt registrieren</a></p>
</div>

</body>
</html>
