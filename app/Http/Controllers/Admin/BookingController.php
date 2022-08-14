<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Booking;

class BookingController extends Controller
{
    public function listBooking(Request $request)
    {   
        $titlePage = 'Admin | Management Booking';

        $bookings = Booking::with(['user','hotel','payment'])
            ->when($request->keyword, function ($query, $keyword) {
                    
                    return $query->where('booking_code','LIKE',"%".$keyword."%"); 
                    
            })->orderby('updated_at','desc')->paginate(20);

        $data = [
            'title' => $titlePage,
            'bookings' => $bookings
        ];
        return view('Booking.list-booking', $data);
    }

    public function changStatusBooking(Request $request, $idBooking)
    {
        $booking = Booking::find($idBooking);

        if($request->status ==='completed')
        {
            if ($booking->status === 1) {
               $booking->status = 2;
               $booking->save();
            }else{
                $request->session()->flash("error","Can not Completed booking!" );
                return redirect()->back();
            }
            $request->session()->flash("success","Completed booking successfully!" );
            return redirect()->back();
        }
        if($request->status ==='cancelled')
        {
            if ($booking->status === 1) {
               $booking->status = 3;
               $booking->save();
            }else{
                $request->session()->flash("error","Can not cancelled booking!" );
                return redirect()->back();
            }
            $request->session()->flash("success","cancelled booking successfully!" );
            return redirect()->back();
        }

    }
    
}
