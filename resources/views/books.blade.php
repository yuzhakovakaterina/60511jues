<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>Список книг:</h2>
<table border="1">
    <thead>
    <tr>
        <th>Книга</th>
        <th>Автор</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
    <tr>
        <td>{{$book->name}}</td>
        <td>{{$book->authors->name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
