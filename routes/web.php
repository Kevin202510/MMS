<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

Route::middleware('admin')->group(function () {
    Route::get('/temperature', function () { return view('temperature.index'); })->name('Temperature')->middleware('auth');
    Route::get('/humidity', function () { return view('humidity.index'); })->name('Humidity')->middleware('auth');
    Route::get('/light', function () { return view('lights.index'); })->name('Light')->middleware('auth');
    Route::get('/carbondioxide', function () { return view('carbondioxide.index'); })->name('CarbonDioxide')->middleware('auth');
    Route::get('/soil', function () { return view('soil.index'); })->name('SoilMoisture')->middleware('auth');
    Route::get('/water', function () { return view('water.index'); })->name('WaterLevel')->middleware('auth');
    Route::get('/users', function () { return view('users.index'); })->name('Users')->middleware('auth');
 

    // API's
    

    Route::prefix('/api/humidity')->group(function() 
    {
        Route::get('/', 'HumidityController@index');
        Route::get('/getNewVal', 'HumidityController@index2');
        Route::post('/save', 'HumidityController@save'); 
        Route::put('/{roles}/update', 'HumidityController@update');
        Route::delete('/{roles}/destroy', 'HumidityController@destroy');  
    });

    Route::prefix('/api/carbondioxide')->group(function() 
    {
        Route::get('/', 'CarbonDioxideController@index');
        Route::get('/getNewVal', 'CarbonDioxideController@index2');
        Route::post('/save', 'CarbonDioxideController@save'); 
        Route::put('/{roles}/update', 'CarbonDioxideController@update');
        Route::delete('/{roles}/destroy', 'CarbonDioxideController@destroy');  
    });

    Route::prefix('/api/soil')->group(function() 
    {
        Route::get('/', 'SoilmoistureController@index');
        Route::get('/getNewVal', 'SoilmoistureController@index2');
        Route::post('/save', 'SoilmoistureController@save'); 
        Route::put('/{roles}/update', 'SoilmoistureController@update');
        Route::delete('/{roles}/destroy', 'SoilmoistureController@destroy');  
    });

    Route::prefix('/api/water')->group(function() 
    {
        Route::get('/', 'WaterlevelController@index');
        Route::get('/getNewVal', 'WaterlevelController@index2');
        Route::post('/save', 'WaterlevelController@save'); 
        Route::put('/{roles}/update', 'WaterlevelController@update');
        Route::delete('/{roles}/destroy', 'WaterlevelController@destroy');  
    });


    Route::prefix('/api/light')->group(function() 
    {
        Route::get('/', 'LightsController@index');
        Route::get('/getNewVal', 'LightsController@index2');
        Route::post('/save', 'HumidityController@save'); 
        Route::put('/{roles}/update', 'HumidityController@update');
        Route::delete('/{roles}/destroy', 'HumidityController@destroy');  
    });


    Route::prefix('/api/temperature')->group(function() 
    {
        Route::get('/', 'TemperatureController@index');
        Route::get('/getNewVal', 'TemperatureController@index2');
        Route::post('/save', 'TemperatureController@save'); 
        Route::put('/{roles}/update', 'TemperatureController@update');
        Route::delete('/{roles}/destroy', 'TemperatureController@destroy');  
    });

    Route::prefix('/api/users')->group(function() 
    {
        Route::get('/', 'UserController@index');
        Route::get('/list', 'UserController@list'); 
        Route::post('/save', 'UserController@save'); 
        Route::put('/{user}/update', 'UserController@update');
        Route::delete('/{user}/destroy', 'UserController@destroy');  
    });


});
