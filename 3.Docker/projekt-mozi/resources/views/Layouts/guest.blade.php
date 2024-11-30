@extends("Layouts.layouts")
@extends('Layouts.app')

@section("Title", "Catnip Plex")
@section("content")

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/kezdolap.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>


</head>
<body>

<header>
    <h1>Mozifilmek</h1>
</header>
<div class="container">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
        </div>
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/blackadam.jpg') }}" alt="blackadam"  class="d-block w-100">
            <div class="carousel-caption">
                <h2>Black Adam</h2>
                <p>Rendezte: Jaume Collet-Serra</p>
              </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/batman.jpg') }}" alt="Batman"  class="d-block w-100">
            <div class="carousel-caption">
                <h2>Batman</h2>
                <p>Rendezte: Matt Reeves</p>
              </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/godzilla.jpg') }}" alt="godzilla"  class="d-block w-100">
            <div class="carousel-caption">
                <h2>Kong: Skull Island</h2>
                <p>Rendezte: Jordan Vogt-Robertss</p>
              </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="d-block w-100">
            <div class="carousel-caption">
                <h3>Avatar</h3>
                <p>Rendezte: <span>James Cameron</span></p>
              </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/nightinsoho.jpg') }}" alt="Venom" class="d-block w-100">
            <div class="carousel-caption">
                <h3>Last Night in Soho</h3>
                <p>Rendezte: Edgar Wright</p>
              </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/matrix.jpg') }}" alt="Venom" class="d-block w-100">
            <div class="carousel-caption">
                <h3>The Matrix (1999)</h3>
                <p>Rendezték:  Lana Wachowski, Lilly Wachowski</p>
              </div>
          </div>

        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      
      <div class="container-center mt-3">
        <h2>Foglalj jegyeket</h2>
        <p>Legjobb legmenőbb filmeket vetítjük jó áron!</p>
      </div>
</div>
<div class="container">
  <div class="container mt-3">
    <div class="row">
      @foreach($movies as $movie)
      <div class="col">
        <div class="card">
          <div class="card__corner"></div>
          <div class="card__img">
            <img class="card-img" src="{{ asset($movie->moviePicture) }}" alt="{{ $movie->title }}">
            <span class="card__span">{{ $movie->title }}</span>
          </div>
          <div class="card-int">
            <p class="card-int__title">{{ $movie->title }}</p>
            <p class="excerpt">{{ $movie->description }}</p>
            <p class="excerpt">Film hossza:  {{ $movie->duration }}</p>
            <a href="{{ route('movies.show', ['id' => $movie->id]) }}" class="card-int__button btn btn-primary">Jegyfoglalás</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>  
@endsection