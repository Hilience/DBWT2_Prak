<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <nav id="nav">
        @vite(['resources/css/nav.css', 'resources/js/nav.js'])
    </nav>

    <footer id="cookie_check"></footer>

    <script src="{{ asset('js/cookieFenster.js') }}"></script>
</body>
</html>
