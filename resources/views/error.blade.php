<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>{{ $message ?? $_GET['message'] ?? 'Ошибка доступа' }}</h2>
<a href="{{ url('books') }}">Назад</a>
</body>
</html>
