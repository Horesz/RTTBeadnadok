<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vetiteseks;
use App\Models\Movies;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class VetiteseksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movies::all();
        $rooms = Rooms::all();

        $batman = $movies->where('title', 'Batman')->first();
        $roomSzabadsagTerem = $rooms->where('name', 'Szabadság Terem')->first();
        
        if ($batman && $roomSzabadsagTerem) {
            Vetiteseks::create([
                'movie_id' => $batman->id,
                'room_id' => $roomSzabadsagTerem->id,
                'start_time' => Carbon::today()->setHour(13)->setMinute(0), // 13:00
            ]);
        } else {
            Log::error('Nem sikerült létrehozni a Batman vetítést. Batman vagy Szabadság Terem nem található.');
        }

        // Black Adam vetítések
        $blackAdam = $movies->where('title', 'Black adam')->first();
        $roomSzabadsagTerem = $rooms->where('name', 'Szabadság Terem')->first();
        Vetiteseks::create([
            'movie_id' => $blackAdam->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(13)->setMinute(30), // 13:30
        ]);
        Vetiteseks::create([
            'movie_id' => $blackAdam->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(15)->setMinute(30), // 15:30
        ]);

        // The Lord of the Rings: The Return of the King vetítések
        $lotr = $movies->where('title', 'The Lord of the Rings: The Return of the King')->first();
        $roomPuskinTerem = $rooms->where('name', 'Puskin Terem')->first();
        Vetiteseks::create([
            'movie_id' => $lotr->id,
            'room_id' => $roomPuskinTerem->id,
            'start_time' => Carbon::today()->setHour(17)->setMinute(40), // 17:40
        ]);
        Vetiteseks::create([
            'movie_id' => $lotr->id,
            'room_id' => $roomPuskinTerem->id,
            'start_time' => Carbon::today()->setHour(20)->setMinute(0), // 20:00
        ]);

        // Inception vetítések
        $inception = $movies->where('title', 'Inception')->first();
        $roomPuskinTerem = $rooms->where('name', 'Puskin Terem')->first();
        Vetiteseks::create([
            'movie_id' => $inception->id,
            'room_id' => $roomPuskinTerem->id,
            'start_time' => Carbon::today()->setHour(13)->setMinute(0), // 13:00
        ]);
        Vetiteseks::create([
            'movie_id' => $inception->id,
            'room_id' => $roomPuskinTerem->id,
            'start_time' => Carbon::today()->setHour(16)->setMinute(0), // 16:00
        ]);

        // The Dark Knight vetítések
        $darkKnight = $movies->where('title', 'The Dark Knight')->first();
        $roomSzabadsagTerem = $rooms->where('name', 'Szabadság Terem')->first();
        Vetiteseks::create([
            'movie_id' => $darkKnight->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(13)->setMinute(0), // 13:00
        ]);
        Vetiteseks::create([
            'movie_id' => $darkKnight->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(15)->setMinute(0), // 15:00
        ]);

        // The Artist vetítések
        $artist = $movies->where('title', 'The Artist')->first();
        $roomSzabadsagTerem = $rooms->where('name', 'Szabadság Terem')->first();
        Vetiteseks::create([
            'movie_id' => $artist->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(17)->setMinute(0), // 17:00
        ]);
        Vetiteseks::create([
            'movie_id' => $artist->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(19)->setMinute(0), // 19:00
        ]);

        // Kong: Koponya sziget vetítések
        $kong = $movies->where('title', 'Kong: Koponya sziget')->first();
        $roomPuskinTerem = $rooms->where('name', 'Puskin Terem')->first();
        Vetiteseks::create([
            'movie_id' => $kong->id,
            'room_id' => $roomPuskinTerem->id,
            'start_time' => Carbon::today()->setHour(13)->setMinute(0), // 13:00
        ]);
        Vetiteseks::create([
            'movie_id' => $kong->id,
            'room_id' => $roomPuskinTerem->id,
            'start_time' => Carbon::today()->setHour(15)->setMinute(0), // 15:00
        ]);

        // A The Grand Budapest Hotel film vetites
        $grandBudapestHotel = $movies->where('title', 'The Grand Budapest Hotel')->first();
        Vetiteseks::create([
            'movie_id' => $grandBudapestHotel->id,
            'room_id' => $roomSzabadsagTerem->id,
            'start_time' => Carbon::today()->setHour(15)->setMinute(0), // 15:00
        ]);

    }
}
