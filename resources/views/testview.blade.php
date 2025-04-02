<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Data</title>
    <!-- Verlinke die CSS-Datei -->
    <link rel="stylesheet" href="{{ asset('css/testview.css') }}">
</head>
<body>
<div class="container">
    <header>
        <h1>Test Data</h1>
    </header>

    <ul class="test-list">
        @foreach($testData as $data)
            <li class="test-item">
                <span class="test-id">ID: {{ $data->id }}</span>
                <span class="test-name">Name: {{ $data->ab_testname }}</span>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
