<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'vetiteseks_id',
        'seat_number',
        'is_reserved',
    ];

    public function vetiteseks()
    {
        return $this->belongsTo(Vetiteseks::class);
    }
}

