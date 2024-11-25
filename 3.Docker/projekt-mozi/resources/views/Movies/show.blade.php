    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jegyfoglalás - {{ $movie->title }}</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/show.css')  }}">
        <style>
            .seat:not(.selected) {
                background-color: green;
            }
            .seat.booked {
            background-color: red !important;
            }
            <style>
        .seat-checkbox {
            display: none;
        }
        
        .seat-label {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            margin-bottom: 10px;
            background-color: green;
            display: inline-block;
            cursor: pointer;
        }

        .selected-seat-label {
            background-color: #c73cc7;
        }

        .reserved-seat-label {
            background-color: red;
        }

        .status-label {
            display: inline-block;
            margin-right: 20px;
        }

        .legend {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .legend-item {
            display: inline-block;
            margin-right: 20px;
        }
    </style>
        </style>
    </head>
        <body class="bg-white">
            @include('layouts.app')
            @include('layouts.header')
            <div class="success_session">
                @if (session()->has('success'))
                <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            

            <div class="container mx-auto py-8 flex">
                <div class="w-3/4">
                    <h2 class="font-bold text-2xl text-gray-800 mb-4">{{ $movie->title }} - {{ $room->name }} - Ülőhely kiválasztása</h2>
                    <p class="card-int__title text-black">{{ $movie->title }}</p>
                    <p class="excerpt text-black">{{ $movie->description }}</p>
                    <p class="excerpt text-black">Film hossza: {{ $movie->duration }} perc</p>
                    <img class="card-img" src="{{ asset('images/godzilla.jpg') }}" alt="{{ $movie->title }}">
                    <br>
                    
                    <div class="mb-4">
                        <img class="mozikep" src="{{ asset($movie->moviePicture) }}" alt="{{ $movie->title }}">
                    </div>
                    <div class="legend">
                        <div class="legend-item">
                            <div class="seat-label"> </div> 
                            <p class="text-black">Szabad ülőhelyek</p>
                        </div>
                        <div class="legend-item">
                            <div class="seat-label selected-seat-label"></div> 
                            <p class="text-black">Kiválasztott ülőhelyek</p>
                        </div>
                        <div class="legend-item">
                            <div class="seat-label reserved-seat-label"></div> 
                            <p class="text-black">Foglalt ülőhelyek</p>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl text-black mb-2">Válassz ülőhelyet</h3>
                    <div id="seat-map" class="flex flex-wrap justify-center lg:px-16">
                        <!-- Itt jelennek meg az ülőhelyek -->
                    </div>
                </div>
                <div class="w-1/4 ml-4 border-l pl-4">
                    <h3 class="font-bold text-xl text-black mb-4">Jegyinformációk</h3>
                    <form method="POST" action="{{ route('movies.jegyfoglalas.store', ['id' => $movie->id]) }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="film_start" value="{{ $vetites->start_time }}">
                        <input type="hidden" id="selected-seats-input" name="selected_seats[]" value="[]">
                        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email cím</label>
                            <input type="email" name="email" id="email" autocomplete="email" required class="mt-1 p-2 block text-black w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Telefonszám</label>
                            <input type="tel" name="phone" id="phone" autocomplete="tel" required class="mt-1 p-2 block text-black w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700">Kategória</label>
                            <select id="category" name="category" required class="mt-1 p-2 block w-full text-black rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                                <option value="" @readonly(true)>Válassz jegytípust</option>
                                <option value="kedvezmenyes">Kedvezményes jegy (diák/nyugdíjas)</option>
                                <option value="teljes">Teljes árú jegy (felnőtt)</option>
                            </select>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Jegyek foglalása</button>
                    
                        <h3 class="font-bold text-xl text-black mb-2">Kiválasztott székek</h3>
                        <ul id="selected-seats" class="text-red-500">
                            <!-- Itt jelennek meg a kiválasztott székek -->
                        </ul>   
                    </form>
                </div>
            </div>
            <script>
                setTimeout(function() {
                    $('#success-alert').fadeOut('fast');
                }, 3000); // 3 másodperc után eltűnik
            </script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    var seatMap = document.getElementById("seat-map");
    var selectedSeatsList = document.getElementById("selected-seats");
    var bookedSeats = @json($bookedSeats); // Ez a sor hozzáadása szükséges

    // Terem neve és ülőhelyek száma
    var roomName = "{{ $room->name }}";
    var numRows, numSeatsPerRow;

    // Terem alapján sorok és ülőhelyek számának meghatározása
    if (roomName === "Szabadság Terem") {
        numRows = 7;
        numSeatsPerRow = 16;
    } else if (roomName === "Puskin Terem") {
        numRows = 9;
        numSeatsPerRow = 18;
    } else {
        // Alapértelmezett értékek más teremnevek esetén
        numRows = 8;
        numSeatsPerRow = 14;
    }

    // Ülőhelyek generálása
    for (var i = 0; i < numRows; i++) {
        var row = document.createElement("div");
        row.classList.add("flex", "mb-2");
        for (var j = 1; j <= numSeatsPerRow; j++) {
            var seat = document.createElement("div");
            seat.classList.add("seat", "bg-gray-300", "w-10", "h-10", "mr-2", "flex", "items-center", "justify-center", "cursor-pointer");
            seat.dataset.seatNumber = (i * numSeatsPerRow) + j;

            // Ellenőrizd, hogy az ülőhely foglalt-e vagy szabad
            if (bookedSeats.includes(seat.dataset.seatNumber.toString())) {
                seat.classList.add("booked");
            } else {
                seat.addEventListener("click", toggleSeat); // Hozzáadva: Kattintás esemény csak szabad helyekhez
            }

            row.appendChild(seat);
        }
        seatMap.appendChild(row);
    }

    // Kiválasztott székek számainak tárolása tömbben
    var selectedSeats = [];

    // Ülőhely kiválasztása
    function toggleSeat() {
        var category = document.getElementById("category").value;
        if (category === "") {
            alert("Kérjük, válasszon jegytípust!");
            return; // Ne folytassuk, ha nincs kiválasztva jegytípus
        }

        var seatNumber = this.dataset.seatNumber;

        if (this.classList.contains("selected")) {
            this.classList.remove("selected");
            removeSeatFromList(seatNumber);
            removeCategorySelection(seatNumber);
            selectedSeats = selectedSeats.filter(function(seat) {
                return seat !== seatNumber;
            });
        } else {
            this.classList.add("selected");
            addSeatToList(seatNumber, category);
            addCategorySelection(seatNumber, category);
            selectedSeats.push(seatNumber);
        }

        // Az ülőhelyek azonosítóit stringként tároljuk
        var selectedSeatsNumbers = selectedSeats.map(Number);
        document.getElementById("selected-seats-input").value = JSON.stringify(selectedSeatsNumbers);

    }

    // Kiválasztott szék hozzáadása a listához
    function addSeatToList(seatNumber, category) {
        var seatListItem = document.createElement("li");
        seatListItem.textContent = "Szék szám: " + seatNumber + " - Jegytípus: " + category;
        selectedSeatsList.appendChild(seatListItem);
    }

    // Kiválasztott szék eltávolítása a listából
    function removeSeatFromList(seatNumber) {
        var selectedSeats = selectedSeatsList.querySelectorAll("li");
        selectedSeats.forEach(function(seat) {
            if (seat.textContent.includes("Szék szám: " + seatNumber)) {
                seat.parentNode.removeChild(seat);
            }
        });
    }

    // Kiválasztott székhez kapcsolódó jegytípus eltávolítása
    function removeCategorySelection(seatNumber) {
        var seats = seatMap.querySelectorAll(".seat");
        seats.forEach(function(seat) {
            if (seat.dataset.seatNumber === seatNumber) {
                seat.dataset.category = "";
            }
        });
    }

    // Jegytípus hozzáadása a kiválasztott székhez
    function addCategorySelection(seatNumber, category) {
        var seats = seatMap.querySelectorAll(".seat");
        seats.forEach(function(seat) {
            if (seat.dataset.seatNumber === seatNumber) {
                seat.dataset.category = category;
            }
        });
    }
});
    </script>
    </body>
    </html>