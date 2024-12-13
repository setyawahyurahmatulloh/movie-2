<!DOCTYPE html>
<html>
<head>
    <title>Edit Movie</title>
</head>
<body>
    <h1>Edit Movie</h1>
    <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
     <input type="text" name="title" id="title" value="{{ $movie->title }}" required><br><br>

   <label for="description">Description:</label>
           <textarea name="description" id="description" required>{{ $movie->description }}</textarea><br><br>

        <label for="genre">Genre:</label>
     <input type="text" name="genre" id="genre" value="{{ $movie->genre }}" required><br><br>

        <label for="rating">Rating:</label>
               <input type="number" name="rating" id="rating" value="{{ $movie->rating }}" step="0.1" required><br><br>

    <label for="image">Image:</label>
    @if($movie->image)
           
        @endif
        <input type="file" name="image" id="image"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
