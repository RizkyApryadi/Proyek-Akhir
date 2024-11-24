<!-- resources/views/genres/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Genre</title>
    <!-- Menambahkan Bootstrap untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Genre</h1>

        <!-- Form untuk membuat genre baru -->
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf

            <!-- Field untuk nama genre -->
            <div class="mb-3">
                <label for="name" class="form-label">Genre Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Genre Name" required>
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol submit -->
            <button type="submit" class="btn btn-primary">Create Genre</button>
        </form>

        <!-- Tautan untuk kembali ke daftar genre -->
        <p class="mt-3"><a href="{{ route('genres.index') }}">Back to Genre List</a></p>
    </div>

    <!-- Menambahkan JS untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
