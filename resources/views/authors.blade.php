<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
    <h2>Авторы:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Автор</td>
        </thead>
    @foreach ($authors as $author)
        <tr>
            <td>{{$author->id}}</td>
            <td>{{$author->last_name}} {{$author->first_name}} {{$author->middle_name}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
