<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
    <h2>Список книг и иx автор:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Автор</td>
            <td>Книга</td>
            <td>Уникальный международный номер книги</td>
            <td>Статус</td>
        </thead>
    @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->author->last_name}} {{$book->author->first_name}} {{$book->author->middle_name}}</td>
            <td>{{$book->books_name}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{$book->status}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
