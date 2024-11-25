<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Vetiteseks;
use App\Models\TicketOrder;
use App\Models\TicketOrderSeats;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    // Controller részben
public function show($id)
{
    $vetites = Vetiteseks::where('movie_id', $id)->firstOrFail();
    $movie = $vetites->movie;
    $room = $vetites->room;
    $seats = $vetites->seats;

    // Az adatbázisból lekérjük a már foglalt helyeket
    $bookedSeats = TicketOrder::where('movie_id', $id)->pluck('seat_number')->reduce(function($seats, $seatNumber)
    {
        if(is_numeric($seatNumber))
        {
            $seats[]=$seatNumber;
        }
        else
        {
            $seatNumber=substr(
                $seatNumber,1,-1
            );
            $seatNumber=explode(',',$seatNumber);
            $seats=array_merge($seats,$seatNumber);
        }
        return $seats;
    },[]);
    

    return view('Movies.show', compact('movie', 'room', 'seats', 'vetites', 'bookedSeats'));
}


    
    public function TicketStore(Request $request, $id)
    {
        // Validálás
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'category' => 'required',
            'selected_seats' => 'required|array',
            'room_id' => 'required',
            'film_start' => 'required',
        ]);
    
        // Ülőhelyek és jegytípusok eltárolása
        foreach ($request->selected_seats as $seatNumber) {
            TicketOrder::create([
                'email' => $request->email,
                'phone' => $request->phone,
                'category' => $request->category,
                'movie_id' => $id,
                'room_id' => $request->room_id,
                'seat_number' => $seatNumber,
                'film_start' => $request->film_start,
            ]);
        }
    
        // Sikeres jegyfoglalás esetén visszairányítás vagy egyéb teendők
        return redirect()->back()->with('success', 'Jegyek sikeresen foglalva!');
    }
            

    public function index()
    {
        $movies = Movies::all();
        return view('Movies.movie', ['movies' => $movies]);
    }

    public function GuestMovies() 
    {
        $movies = Movies::all();
        return view('layouts.guest', ['movies' => $movies]);
    }

    public function DashboardMovies() 
    {
        $movies = Movies::all();
        return view('dashboard', ['movies' => $movies]);
    }

    public function create ()
    {
        return view('Movies.createMovie');
    }

    public function store (Request $request)
    {
        $photoName = $request->file('moviePicture')->getClientOriginalName();
        $path= $request->file('moviePicture')->storeAs('images',$photoName, 'public');
        $data =$request->validate([
            'title'=> 'required',
            'duration'=> 'required|numeric',
            'description' =>'nullable',
            'moviePicture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:80000'
        ]);
        $data["moviePicture"]='/storage/'.$path;

        $newMovie = Movies::create($data);
        return redirect(route('Movies.movie'));
    }

    public function edit(Movies $movie)
    {
        return view('Movies.editMovie',['movies' => $movie]);
    }
    
    public function update(Movies $movies, Request $request)
    {
        $data =$request->validate([
            'title'=> 'required',
            'duration'=> 'required|numeric',
            'description' =>'nullable',
            'moviePicture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ]);
        $movies->update($data);
        
        return redirect(route('Movies.movie'))->with('success','Film sikeresen Frissitve!');
    }

    public function delete(Movies $movie)
    {
        $movie->delete();
        return redirect(route('Movies.movie'))->with('success','A filmet sikeresen törölted az adatbázisból!');
    }
}