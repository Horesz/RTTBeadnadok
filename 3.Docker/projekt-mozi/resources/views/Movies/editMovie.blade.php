<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section("Title", "Film szerkeztő")
</head>
<body>
    <h1>Film Szerkeztés</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form action="{{ route('Movies.update', ['movie' =>$movies])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <input type="text" name="title" placeholder="Film Cím" value="{{ $movies->title }}">
        </div>
        <div>
            <input type="text" name="description" placeholder="Film leírása" value="{{ $movies->description }}">
        </div>
        <div>
            <input type="text" name="duration" placeholder="Film hossz" value="{{ $movies->duration }}">
        </div>
        <div>
            <input type="file" name="moviePicture" value="{{ $movies->moviePicture }}">
        </div>
        <div>
            <button type="submit">Film szerkeztés</button>
        </div>
    </form>
    
</body>
</html>
