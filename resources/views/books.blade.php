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
            <td>
                @if ($book->author)
                    {{$book->author->last_name}} {{$book->author->first_name}} {{$book->author->middle_name}}
                @endif
            </td>
            <td>{{$book->books_name}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{$book->status}}</td>
            <td>
                <a href="{{ auth()->user() && auth()->user()->isAdmin()
                    ? url('books/edit/' . $book->id)
                    : url('/error?message=Доступ к редактированию только для администраторов') }}">
                    Редактировать
                </a>
                <a href="{{ auth()->user() && auth()->user()->isAdmin()
                    ? url('books/destroy/' . $book->id)
                    : url('/error?message=Доступ к удалению только для администраторов') }}">
                    Удалить
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{-- Стандартная пагинация --}}
{{ $books->links() }}
</body>
</html>
