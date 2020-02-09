<?php

use App\Article;
use Illuminate\Http\Request;
#use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')
//         ->get('/user', function (Request $request) {
//             return $request->user();
// });

Route::post('logout', 'Auth\LoginController@logout');

#Step 1
Route::post('register', 'Auth\RegisterController@register');
#Step 2
Route::put('updateuser/{id}', 'Auth\RegisterController@update');
Route::post('login', 'Auth\LoginController@login');


Route::group(['auth:api'],function () {
    ####### MASTER DATA ######
        #Countries
        Route::get('countries', 'CountryController@index'); #works
        Route::get('country/{id}', 'CountryController@show'); #works
        Route::post('country', 'CountryController@store'); #works
        Route::put('country/{id}', 'CountryController@update'); #works
        Route::delete('country/{id}', 'CountryController@delete'); #works

        #Cities OK
        Route::get('cities', 'CityController@index');
        Route::get('city/{id}', 'CityController@show');
        Route::post('city', 'CityController@store');
        Route::put('city/{id}', 'CityController@update');
        Route::delete('city/{id}', 'CityController@delete');

        #Languages OK
        Route::get('languages', 'LanguageController@index');
        Route::get('language/{id}', 'LanguageController@show');
        Route::post('language', 'LanguageController@store');
        Route::put('language/{id}', 'LanguageController@update');

        #Services OK
        Route::get('services', 'ServiceController@index');
        Route::get('service/{id}', 'ServiceController@show');
        Route::post('service', 'ServiceController@store');
        Route::put('service/{id}', 'ServiceController@update'); 

    ###### End of MASTER DATA######

    ####### USER SIGN UP ######
        #User Type 
        Route::post('usertype', 'UserTypeController@store');
        Route::put('usertype/{id}', 'UserTypeController@update'); 
        Route::put('usertype/{id}/host', 'UserTypeController@hostupdate'); 
        Route::put('usertype/{id}/guest', 'UserTypeController@guestupdate'); 

        #Host 
        Route::get('hosts', 'HostController@index');
        Route::get('host/{id}', 'HostController@show');
        Route::post('host', 'HostController@store');
        Route::put('host/{id}', 'HostController@update');
        
        #Guest OK
        Route::get('guests', 'GuestController@index');
        Route::get('guest/{id}', 'GuestController@show');
        Route::post('guest', 'GuestController@store');
        Route::put('guest/{id}', 'GuestController@update');

        #Host Cars
        Route::get('host/{id}/car', 'CarController@show');
        Route::post('host/{id}/car', 'CarController@store');
        Route::put('host/{id}/car/{carid}', 'CarController@update');

    ####### End of USER SIGN UP ######
   
###############################################################################
#CORE HERE#
###############################################################################
    
    #Find Destination
    Route::post('destination', 'DestinationController@find');

    #Booking
    Route::get('booking/cities','BookingController@findCities');
    Route::post('booking/pickup', 'BookingController@findPickup');
    Route::post('booking', 'BookingController@find');
    Route::post('booking/hosts', 'BookingController@hostlist');
    Route::post('booking/stop', 'BookingController@addstop'); #find place
    Route::post('booking/review', 'BookingController@review'); #find route and calculate fees
    Route::post('booking/payment', 'BookingController@payment');
    Route::post('booking/confirm', 'BookingController@confirm');

    #Host : Trip Request
    Route::get('trip/host/requests','HostTripController@requests');
    Route::get('trip/host/request/{id}','HostTripController@show');
    Route::get('trip/host/request','HostTripController@accept');

    #Trips
    Route::get('trips/{id}/host/active', 'TripController@hostactive');
    Route::get('trips/{id}/guest/active', 'TripController@guestactive');
    Route::get('trips/{id}/host/active/detail', 'TripController@detailtrip');
    Route::get('trips/{id}/guest/active/detail', 'TripController@detailtrip');
    Route::get('trips/{id}/active/maps', 'TripController@maps');
    Route::get('trips/{id}/active/maps', 'TripController@maps');
    Route::get('trips/{id}/host/active/timer', 'TripController@timer');
    Route::get('trips/{id}/host/active/updatetrip', 'TripController@updatestop');

    #Static Contents

    

});
