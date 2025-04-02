<!-- resources/views/registriereseite.blade.php -->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <link rel="stylesheet" href="{{ asset('css/registriereSeite.css') }}">
</head>
<body>

<div class="register-container">
    <h2>Registrierung</h2>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf
        <div>
            <label for="ab_name">Benutzername</label>
            <input type="text" id="ab_name" name="ab_name" required>
        </div>

        <div>
            <label for="ab_mail">E-Mail</label>
            <input type="email" id="ab_mail" name="ab_mail" required>
        </div>

        <div>
            <label for="ab_password">Passwort</label>
            <input type="password" id="ab_password" name="ab_password" required>
        </div>

        <div>
            <label for="ab_password_confirmation">Passwort bestätigen</label>
            <input type="password" id="ab_password_confirmation" name="ab_password_confirmation" required>
        </div>

        <button type="submit">Registrieren</button>
    </form>

    <p>Bereits ein Konto? <a href="{{ route('login') }}">Jetzt anmelden</a></p>
</div>

</body>
</html>
