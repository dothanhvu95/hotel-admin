<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function hotel_detail()
    {
        return $this->hasOne(HotelDetail::class);
    }
    public function hotel_facility()
    {
        return $this->hasOne(HotelFacility::class);
    }
}
