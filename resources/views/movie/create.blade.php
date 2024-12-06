<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
</head>
<body>
    <h1>Tambah Movie</h1>
    <form action="/movie" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
     <label for="image">Gambar:</label>
            <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">
            @error('image')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" step="0.1" name="rating" id="rating"  required>
        </div>
        <button type="submit">Add Movie</button>
    </form>
</body>
</html>