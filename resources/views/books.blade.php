<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>Список книг и их авторов:</h2>
<table border="1">
    <thead>
    <tr>
        <td>id</td>
        <td>Автор</td>
        <td>Книга</td>
        <td>Уникальный международный номер книги</td>
        <td>Статус</td>
        <td>Действия</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->author->last_name}} {{$book->author->first_name}} {{$book->author->middle_name}}</td>
            <td>{{$book->books_name}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{$book->status}}</td>
            <td>
                <a href="{{ url('books/destroy/' . $book->id) }}">Удалить</a>
                <a href="{{ url('books/edit/' . $book->id) }}">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    {{-- Стандартная пагинация --}}
    {{ $books->links() }}
</body>
</html>
