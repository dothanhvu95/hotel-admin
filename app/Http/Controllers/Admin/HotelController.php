<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function listHotel()
    {
        return view('Hotel.list-hotel');
    }
    
}
