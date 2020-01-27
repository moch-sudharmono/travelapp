<?php

use App\Article;
use Illuminate\Http\Request;
#use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')
//         ->get('/user', function (Request $request) {
//             return $request->user();
// });

Route::group(['auth:api'],function () {
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

    #User Type OK
    Route::post('usertype', 'UserTypeController@store');
    Route::put('usertype/{id}', 'UserTypeController@update'); 
    Route::put('usertype/{id}/host', 'UserTypeController@hostupdate'); 
    Route::put('usertype/{id}/guest', 'UserTypeController@guestupdate'); 

    #Host OK
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

    #Host Cars Images
    Route::get('host/{id}/car/{carid}/images', 'CarImageController@index');
    Route::get('host/{id}/car/{carid}/image/{imageid}', 'CarImageController@show');
    Route::post('host/{id}/car/{carid}/image', 'CarImageController@store');
    Route::delete('host/{id}/car/{carid}/images/{imageid}', 'CarImageController@delete');

    #Host Documents
    Route::get('host/{id}/documents', 'DocumentController@index');
    Route::get('host/{id}/document/{documentid}', 'DocumentController@show');
    Route::post('host/{id}/document', 'DocumentController@store');
    Route::delete('host/{id}/document/{documentid}', 'DocumentController@update');

    #Host Language
    Route::get('host/{id}/languages', 'LanguageController@hostindex');
    Route::get('host/{id}/language/{languageid}', 'LanguageController@hostshow');
    Route::post('host/{id}/language', 'LanguageController@hoststore');
    Route::delete('host/{id}/language/{languageid}', 'LanguageController@hostdelete');

    #Host Service
    Route::get('host/{id}/services', 'ServiceController@hostindex');
    Route::get('host/{id}/service/{serviceid}', 'ServiceController@hostshow');
    Route::post('host/{id}/service', 'ServiceController@hoststore');
    Route::put('host/{id}/service/{serviceid}', 'ServiceController@hostupdate');
   
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

Route::post('logout', 'Auth\LoginController@logout');

#Works on POSTMAN   
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

