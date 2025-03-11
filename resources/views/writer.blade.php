<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
    <h2>{{$writer ? "Список книг автора: " . $writer->first_name . " " . $writer->middle_name . " " . $writer->last_name : 'Неверное имя автора' }}</h2>
    @if($writer)
    <table border="1">
        <th>
            <td>Книга</td>
            <td>Уникальный международный номер книги</td>
            <td>Статус</td>
        </th>
        @foreach ($writer->books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->books_name}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->status}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>
