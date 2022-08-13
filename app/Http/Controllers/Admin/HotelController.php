<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Model\City;
use App\Model\District;
use App\Model\Ward;
use App\Model\Hotel;
use App\Model\HotelDetail;
use App\Model\HotelFacility;
use App\Model\HotelImage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function listHotel()
    {
        $titlePage = 'Admin | Management Hotel';
        $hotels = Hotel::with('city','district','ward')->orderby('updated_at','desc')->paginate(20);
        // dd($hotels);
        return view('Hotel.list-hotel',['hotels'=> $hotels,'title' => $titlePage]);
    }
    
    public function createHotelView()
    {
        $titlePage = 'Admin | Create a Hotel';

        $cities = City::pluck('desc','id')->all();
        $districts = District::pluck('name','id')->all();
        $wards = Ward::pluck('name','id')->all();

        $data = [
                    'cities' => $cities,
                    'districts' => $districts,
                    'wards' => $wards,
                    'title' => $titlePage
                ];
        return view('Hotel.create-view', $data);
    }


    public function createHotel(Request $request)
    {
        $validater=Validator::make($request->all(),[
            "name" => "required",
            "address" => "required",
            "price" => "required|numeric",
            "description" => "required",
            "city_id" => "required|numeric",
            "district_id" => "required|numeric",
            "ward_id" => "required|numeric",
            'stock' => 'required',
            'sqft' => 'nullable',
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
            'images' => 'required',

        ]);

        if($validater->fails()){
            return redirect()->back()->withErrors($validater)->withInput();
        }else{
            DB::transaction(function () use ($request) {
                $dataHotel = $request->only('name','address','price','description','city_id','district_id','ward_id','is_recommand','is_popular','is_trending','stock');
                $createHotel = Hotel::create($dataHotel);


                $dataHotelDetail = $request->only('four_bedrooms','one_bedrooms','two_bedrooms','is_hotel','two_bathrooms','sqft');
                $dataHotelDetail['hotel_id'] = $createHotel->id;

                HotelDetail::create($dataHotelDetail);

                $dataHotelFacility = $request->only('have_swimming','have_wifi','have_restaurant','have_parking','have_meeting_room','have_elevator','have_fitness_center','have_open');
                $dataHotelFacility['hotel_id'] = $createHotel->id; 

                HotelFacility::create($dataHotelFacility);

                $hid = $createHotel->id;
                $dir = $hid % 1000;
                $filepath = 'hotels/'.$dir.'/'.$hid;
                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $image) {

                        $prefix = $hid . '_'
                            . Carbon::now()->format('Ymdhis') . '_'
                            . Str::random(8);

                        $result = $this->upload_images($image, $filepath, $prefix, config('image.size.hotel_images'));

                        $hotelPicture = new HotelImage();
                        $hotelPicture->hotel_id = $hid;
                        $hotelPicture->label = '';
                        $hotelPicture->small = $result['small'];
                        $hotelPicture->medium = $result['medium'];
                        $hotelPicture->large = $result['large'];
                        $hotelPicture->fhd = $result['fhd'];
                        $hotelPicture->original = $result['original'];
                        $hotelPicture->save();
                    }
                }
            });
            $request->session()->flash("success","Create a hotel successfully!" );
            return redirect()->back();    
        }
    }



}
