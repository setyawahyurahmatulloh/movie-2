<!DOCTYPE html>
<html>
<head>
    <title>Movie List</title>
</head>
<body>
    <h1>Movie</h1>
    <a href="/movie/create">Tambah</a>
    <ul>
        @foreach($movie as $movie)
        <li>
            
            @if($movie->image)
                <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }}">

            @endif

            
            
            <div>
                Nama:<strong>{{ $movie->title }}</strong> 
                Genre:({{ $movie->genre }})<br>
                Rating: {{ $movie->rating }} / 10<br>
                Dscripsi<em>{{ $movie->description }}</em>
                <<form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>

            </div>
            

        </li>
        @endforeach
    </ul>
</body>
</html>
