<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Hotel;
use App\Model\Booking;
use App\Model\User;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $titlePage = 'Admin | Dashboard';
        $totalUser = User::all();
        $totalHotel = Hotel::all();
        $totalBooking = Booking::all(); 
        $turnover = 0;
        $sumPriceBooking = Booking::get()->sum('price');
        $sumDayBooking = Booking::get()->sum('number_day');

        $turnover = $sumPriceBooking * $sumDayBooking;
        $data = [
            'title' => $titlePage,
            'totalUser' => count($totalUser),
            'totalHotel' => count($totalHotel),
            'totalBooking' => count($totalHotel),
            'turnover' => $turnover
        ];
        return view('Dashboard.dashboard', $data);
    }
}
