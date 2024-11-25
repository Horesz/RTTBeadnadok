<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seats;


class Vetiteseks extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'movie_id', 'start_time'];
    
    public function movie()
    {
        return $this->belongsTo(Movies::class);
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    
}