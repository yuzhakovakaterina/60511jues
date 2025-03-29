<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
</head>
<body>
<h2>{{$reader ? "Читатель: " . $reader->first_name . " " . $reader->middle_name . " " . $reader->last_name : 'Данного читателя не существует'}}</h2>
<h2>Количество книг: {{ $bookCount }}</h2>
@if($reader)
    <table border="1">
        <tr>
            <td>Книга</td>
            <td>Автор</td>
            <td>ISBN</td>
            <td>Дата выдачи</td>
            <td>Дата возврата</td>
            <td>Плановая дата возврата</td>
        </tr>
        @foreach ($reader->books as $book)
            <tr>
                <td>{{$book->books_name}}</td>
                <td>
                    @if ($book->author)
                        {{$book->author->last_name}} {{$book->author->first_name}} {{$book->author->middle_name}}
                    @endif
                </td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->pivot->date_in}}</td>
                <td>{{$book->pivot->date_out}}</td>
                <td>{{$book->pivot->date_out_plan}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
