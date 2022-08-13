<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\City;
use App\Model\District;
use App\Model\Ward;

class LocationController extends Controller
{
    public function getCity()
    {   
    	$cities = City::all();
        return response()->json($cities);
    }
    public function getDistrict($idCity)
    {   
        $districts = District::where('city_code', $idCity)->get();
        return response()->json($districts);
    }
    public function getWard($idWard)
    {   
        $wards = Ward::where('district_code', $idWard)->get();
        return response()->json($wards);
    }
    
}
