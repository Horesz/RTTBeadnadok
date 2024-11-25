<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketOrder extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'category',
        'movie_id',
        'room_id',
        'seat_number',
        'film_start',
    ];

    // Egy jegyrendelés egy filmhez tartozik
    public function movies()
    {
        return $this->belongsTo(Movies::class);
    }

    // Egy jegyrendelés egy teremhez tartozik
    public function rooms()
    {
        return $this->belongsTo(Rooms::class);
    }
}