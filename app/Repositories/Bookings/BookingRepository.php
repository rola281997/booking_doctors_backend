<?php

namespace App\Repositories\Bookings;

use App\Models\Booking;
use Prettus\Repository\Eloquent\BaseRepository;
class BookingRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Booking::class;
    }

}
