<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>605-11</title>
    <style>
        .is-invalid { color: red; }
        label { margin-top: 10px; }
        input, select,div,button { margin-top: 10px; }
        .hidden { display: none; }
    </style>
    <script>
        function toggleAuthorFields() {
            const authorSelect = document.getElementById('authorSelect');
            const newAuthorFields = document.getElementById('newAuthorFields');
            const isNewAuthorSelected = authorSelect.value === "";

            // Автор из списка не выбран, поля видны
            newAuthorFields.classList.toggle('hidden', !isNewAuthorSelected);
            document.querySelectorAll('.new-author-required').forEach(input => {
                input.required = isNewAuthorSelected;
            });
            authorSelect.required = !isNewAuthorSelected;
        }
    </script>
</head>
<body>
<h2>Добавление книги в библиотеку</h2>
<form method="POST" action="{{ url('books') }}">
    @csrf

    <label>Название книги</label>
    <input type="text" name="books_name" value="{{ old('books_name') }}" required />
    @error('books_name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ old('isbn') }}" required />
    @error('isbn')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Статус</label>
    <input type="text" name="status" value="{{ old('status') }}" required />
    @error('status')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <label>Выберите автора</label>
    <select id="authorSelect" name="author_id" onchange="toggleAuthorFields()">
        <option value="">-- Выберите автора --</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->last_name }} {{ $author->first_name }} {{ $author->middle_name }}</option>
        @endforeach
    </select>
    @error('author_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>

    <div id="newAuthorFields" class="hidden"> <!-- Поля для нового автора -->
        <label>Если автора нет в списке, введите его данные:</label>
        <br>

        <label>Фамилия автора</label>
        <input type="text" class="new-author-required" name="last_name" value="{{ old('last_name') }}" />
        @error('last_name')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Имя автора</label>
        <input type="text" class="new-author-required" name="first_name" value="{{ old('first_name') }}" />
        @error('first_name')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Отчество автора</label>
        <input type="text" class="new-author-required" name="middle_name" value="{{ old('middle_name') }}" />
        @error('middle_name')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Год рождения автора</label>
        <input type="number" class="new-author-required" name="year_of_birth" value="{{ old('year_of_birth') }}" />
        @error('year_of_birth')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
    </div>

    <button type="submit">Добавить книгу</button>
</form>

<script>
    toggleAuthorFields();
</script>
</body>
</html>

