<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\City;
use App\Model\District;
use App\Model\Ward;
use App\Model\Hotel;
use App\Model\HotelDetail;
use App\Model\HotelFacility;

class HotelController extends Controller
{
    public function listHotel()
    {
        return view('Hotel.list-hotel');
    }
    
    public function createHotelView()
    {
        $cities = City::pluck('desc','id')->all();
        $districts = District::pluck('name','id')->all();
        $wards = Ward::pluck('name','id')->all();

        $data = [
                    'cities' => $cities,
                    'districts' => $districts,
                    'wards' => $wards
                ];
        return view('Hotel.create-view', $data);
    }


    public function createHotel(Request $request)
    {
        $validater=Validator::make($request->all(),[
            "name" => "required",
            "address" => "required",
            "price" => "required",
            "description" => "required",
            "city_id" => "required",
            "district_id" => "required",
            "ward_id" => "required",
            "is_recommand" => "nullable",
            "is_popular" => "nullable",
            "is_trending" => "nullable",
            "four_bedrooms" => "nullable",
            "one_bedrooms" => "nullable",
            "two_bedrooms" => "nullable",
            "is_hotel" => "nullable",
            "two_bathrooms" => "nullable",
            "have_swimming" => "nullable",
            "have_wifi" => "nullable",
            "have_restaurant" => "nullable",
            "have_parking" => "nullable",
            "have_meeting_room" => "nullable",
            "have_elevator" => "nullable",
            "have_fitness_center" => "nullable",
            "have_open" => "nullable",
            'images' => 'required'


        ],[
            "name.required"=>"Vui lòng nhập tên khách sạn.",
        ]);

        if($validater->fails()){
            return redirect()->back()->withErrors($validater)->withInput();
        }else{
            dd($request->all());
            $dataHotel = $request->only('name','address','price','description','city_id','district_id','ward_id','is_recommand','is_popular','is_trending');
            $createHotel = Hotel::create($dataHotel);


            $dataHotelDetail = $request->only('four_bedrooms','one_bedrooms','two_bedrooms','is_hotel','two_bathrooms');
            $dataHotelDetail['hotel_id'] = $createHotel->id;

            HotelDetail::create($dataHotelDetail);

            $dataHotelFacility = $request->only('have_swimming','have_wifi','have_restaurant','have_parking','have_meeting_room','have_elevator','have_fitness_center','have_open');
            $dataHotelFacility['hotel_id'] = $createHotel->id; 

            HotelFacility::create($dataHotelFacility);
           dd($request->all());    
                
                
        }
    }
}
