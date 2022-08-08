<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'Auth\LoginController@login');
Route::post('/loginPost', 'Auth\LoginController@postlogin');
Route::get('logout',function(){
                Auth::logout();
                return Redirect::to('/login');
            });
Route::group(["prefix"=>"admin",'middleware'=>'isadmin'],function(){

    Route::get('/dashboard', 'Admin\DashboardController@dashboard');

    Route::group(["prefix"=>"user"],function(){
       
        Route::get('/', 'Admin\UserController@listUser');
    }); 

    Route::group(["prefix"=>"hotel"],function(){
       
        Route::get('/', 'Admin\HotelController@listHotel');
        Route::get('/create', 'Admin\HotelController@createHotelView');
        Route::post('/create-hotel', 'Admin\HotelController@createHotel');
    });

    Route::group(["prefix"=>"booking"],function(){
       
        Route::get('/', 'Admin\BookingController@listBooking');
    });

});