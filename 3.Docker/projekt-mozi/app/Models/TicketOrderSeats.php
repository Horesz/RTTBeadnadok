<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketOrderSeats extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_order_id',
        'seat_number',
    ];

    // Egy ülőhely kapcsolódik egy jegyrendeléshez
    public function ticketOrder()
    {
        return $this->belongsTo(TicketOrder::class);
    }
}
