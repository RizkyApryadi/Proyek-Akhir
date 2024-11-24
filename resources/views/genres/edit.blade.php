<!-- resources/views/genres/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
</head>
<body>
    <h1>Edit Genre</h1>

    <!-- Form untuk mengedit genre -->
    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $genre->name }}" required>
        <button type="submit">Update Genre</button>
    </form>

    <p><a href="{{ route('genres.index') }}">Back to Genre List</a></p>
</body>
</html>
