<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
    <style> .is-invalid { color: red; }
            label { margin-top: 10px; }
            input { margin-top: 10px; }
    </style>
</head>
<body>
<h2>Редактирование книг</h2>
<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    <input type="hidden" name="author_id" value="{{ $author->id }}"/>

    <label>Название книги</label>
    <input type="text" name="books_name" value="@if (old('books_name')) {{ old('books_name') }} @else {{ $book->books_name }} @endif"/>
    @error('books_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Фамилия автора</label>
    <input type="text" name="last_name" value="@if (old('last_name')) {{ old('last_name') }} @else {{ $author->last_name }} @endif"/>
    @error('last_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Имя автора</label>
    <input type="text" name="first_name" value="@if (old('first_name')) {{ old('first_name') }} @else {{ $author->first_name }} @endif"/>
    @error('first_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Отчество автора</label>
    <input type="text" name="middle_name" value="@if (old('middle_name')) {{ old('middle_name') }} @else {{ $author->middle_name }} @endif"/>
    @error('middle_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Год рождения автора</label>
    <input type="text" name="year_of_birth" value="@if (old('year_of_birth')) {{ old('year_of_birth') }} @else {{ $author->year_of_birth }} @endif"/>
    @error('year_of_birth')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>ISBN</label>
    <input type="text" name="isbn" value="@if (old('isbn')) {{ old('isbn') }} @else {{ $book->isbn }} @endif"/>
    @error('isbn')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Статус</label>
    <input type="text" name="status" value="@if (old('status')) {{ old('status') }} @else {{ $book->status }} @endif"/>
    @error('status')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <input type="submit" value="Обновить книгу">
</form>
</body>
</html>

