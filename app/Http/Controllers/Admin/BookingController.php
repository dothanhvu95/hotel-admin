<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Booking;

class BookingController extends Controller
{
    public function listBooking()
    {   
        $titlePage = 'Admin | Management Booking';

        $bookings = Booking::with(['user','hotel','payment'])->orderby('id','desc')->paginate(20);

        $data = [
            'title' => $titlePage,
            'bookings' => $bookings
        ];
        return view('Booking.list-booking', $data);
    }
    
}
