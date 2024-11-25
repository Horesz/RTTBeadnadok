<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/movies.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->
    <header>
@include("Layouts.header")
       
    </header>

    <!-- Main Content -->
    <main>
        <div class="container mt-5">
            <h1>Filmek</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($movies as $movie)
                    <div class="col">
                        <div class="card">
                            <img src="{{ $movie->moviePicture }}" class="card-img-top" alt="Borítókép">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{ $movie->description }}</p>
                                <p class="card-text"><small class="text-muted">Hossz: {{ $movie->duration }}</small></p>
                                <a href="{{ route('Movies.edit', ['movie'=>$movie]) }}" class="btn btn-outline-info">Edit</a>
                                <form action="{{ route('Movies.delete',['movie'=>$movie]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="text-center py-4">
            <p>&copy; 2024 Catnip Plex. Minden jog fenntartva.</p>
        </div>
    </footer>

    <script src="path/to/your/scripts.js"></script> <!-- Add any custom scripts here -->
</body>
</html>
