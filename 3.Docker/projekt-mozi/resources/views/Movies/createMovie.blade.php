<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/kezdolap.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Film készítés</title>
</head>
<body>
   
    
    <div class="container mt-5">
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
                
            @endif
        </div>
        <h1>Új film hozzáadása</h1>
        <form action="{{ route('Movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="title" class="form-label"><h3>Film Cím</h3></label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Film Cím">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><h3>Film leírása</h3></label>
                <textarea class="form-control" name="description" id="description" placeholder="Film leírása"></textarea>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label"><h3>Film hossz</h3></label>
                <input type="text" class="form-control" name="duration" id="duration" placeholder="Film hossz">
            </div>
            <div class="mb-3">
                <label for="moviePicture" class="form-label"><h3>Kép kiválasztása</h3></label>
                <input type="file" class="form-control" name="moviePicture" id="moviePicture">
            </div>
            <button type="submit" class="btn btn-outline-success">Új film mentése</button>
        </form>
    </div>
    
</body>
</html>
