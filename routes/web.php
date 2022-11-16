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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/notify', 'Notifyusermmsstatus@sendEmail');
Route::get('/lockscreen', function () { return view('layouts.lockscreen'); })->name('lockscreen');
Route::get('/video', function () { return view('video.index'); })->name('Video')->middleware('auth');
Route::prefix('/api/mushroomvar')->group(function() 
{
    Route::get('/', 'SensorsconfigurationController@index');
});

Route::middleware('admin')->group(function () {

    Route::get('/users', function () { return view('users.index'); })->name('Users')->middleware('auth');
    Route::get('/roles', function () { return view('roles.index'); })->name('Roles')->middleware('auth');
    Route::get('/export', 'UserController@export')->name('Export')->middleware('auth');
    
    // API's

    Route::prefix('/api/humidity')->group(function() 
    {
        Route::post('/save', 'HumidityController@save'); 
    });

    Route::prefix('/api/carbondioxide')->group(function() 
    {
        Route::post('/save', 'CarbonDioxideController@save'); 
    });

    Route::prefix('/api/soil')->group(function() 
    {
        Route::post('/save', 'SoilmoistureController@save'); 
    });

    Route::prefix('/api/water')->group(function() 
    {
        Route::post('/save', 'WaterlevelController@save'); 
    });


    Route::prefix('/api/light')->group(function() 
    {
        Route::post('/save', 'LightsController@save');  
    });


    Route::prefix('/api/temperature')->group(function() 
    {
        Route::post('/save', 'TemperatureController@save'); 
    });

    Route::prefix('/api/users')->group(function() 
    {
        Route::get('/', 'UserController@index');
        Route::get('/list', 'UserController@list'); 
        Route::post('/save', 'UserController@save');
        Route::post('/checkpass', 'UserController@makeHashPass'); 
        Route::put('/{user}/updateProfile', 'UserController@updateProfile'); 
        Route::put('/{user}/updatePassword', 'UserController@updatePassword'); 
        Route::post('/upload/save', 'UserController@upload'); 
        Route::put('/{user}/update', 'UserController@update');
        Route::put('/{user}/updatestatus', 'UserController@updatestatus');
        Route::put('/{user}/updatestatusDisapproved', 'UserController@updatestatusDisapproved');
        Route::delete('/{user}/destroy', 'UserController@destroy');  
    });

    Route::prefix('/api/roles')->group(function() 
    {
        Route::get('/', 'RolesController@index');
        Route::post('/save', 'RolesController@save'); 
        Route::put('/{roles}/update', 'RolesController@update');
        Route::delete('/{roles}/destroy', 'RolesController@destroy');  
    });
});

Route::middleware('employeeOrAdmin')->group(function () {

    Route::get('/sensorsconfiguration', function () { return view('sensors_configuration.index'); })->name('Sensor Configuration')->middleware('auth');
    Route::get('/sensorsconfigurationhistory', function () { return view('sensors_configuration.history'); })->name('Sensor Configuration History')->middleware('auth');
    Route::get('/temperature', function () { return view('temperature.index'); })->name('Temperature')->middleware('auth');
    Route::get('/humidity', function () { return view('humidity.index'); })->name('Humidity')->middleware('auth');
    Route::get('/light', function () { return view('lights.index'); })->name('Light')->middleware('auth');
    Route::get('/carbondioxide', function () { return view('carbondioxide.index'); })->name('CarbonDioxide')->middleware('auth');
    Route::get('/soil', function () { return view('soil.index'); })->name('SoilMoisture')->middleware('auth');
    Route::get('/water', function () { return view('water.index'); })->name('WaterLevel')->middleware('auth');
    // Route::get('/export-temperature/{tempgeneratedata}', 'TemperatureController@export')->name('Export')->middleware('auth');
    Route::get('/export-humidity', 'HumidityController@export')->name('Export')->middleware('auth');
    Route::get('/export-carbondioxide', 'CarbonDioxideController@export')->name('Export')->middleware('auth');
    Route::get('/export-lights', 'LightsController@export')->name('Export')->middleware('auth');

    Route::prefix('/api/exporttemperature')->group(function() 
    {
        Route::post('/generatereport', 'TemperatureController@export');
    });

    Route::prefix('/api/humidity')->group(function() 
    {
        Route::get('/', 'HumidityController@index');
        Route::get('/getNewVal', 'HumidityController@index2');
    });

    Route::prefix('/api/carbondioxide')->group(function() 
    {
        Route::get('/', 'CarbonDioxideController@index');
        Route::get('/getNewVal', 'CarbonDioxideController@index2');
    });

    Route::prefix('/api/soil')->group(function() 
    {
        Route::get('/', 'SoilmoistureController@index');
        Route::get('/getNewVal', 'SoilmoistureController@index2');
    });

    Route::prefix('/api/water')->group(function() 
    {
        Route::get('/', 'WaterlevelController@index');
        Route::get('/getNewVal', 'WaterlevelController@index2');
    });


    Route::prefix('/api/light')->group(function() 
    {
        Route::get('/', 'LightsController@index');
        Route::get('/getNewVal', 'LightsController@index2');
    });


    Route::prefix('/api/temperature')->group(function() 
    {
        Route::get('/', 'TemperatureController@index');
        Route::get('/getNewVal', 'TemperatureController@index2');
    });

    Route::prefix('/api/sensorsconfigurations')->group(function() 
    {
        Route::get('/', 'SensorsconfigurationController@index1');
        Route::get('/indexs', 'SensorsconfigurationController@index');
        Route::put('/indexs/{sensorsconfiguration}/activate', 'SensorsconfigurationController@activate');
        Route::post('/indexs/save', 'SensorsconfigurationController@save'); 
        Route::put('/{sensorsconfiguration}/update', 'SensorsconfigurationController@update');
        Route::delete('/{sensorsconfiguration}/destroy', 'SensorsconfigurationController@destroy');
    });

    Route::prefix('/api/histories')->group(function() 
    {
        Route::get('/', 'SensorsconfigurationController@index2');
        Route::delete('/{sensorsconfiguration}/recover', 'SensorsconfigurationController@recover');
    });

    Route::prefix('/api/users')->group(function() 
    {
        Route::post('/{user}/updateProfile', 'UserController@updateProfile'); 
        Route::put('/{user}/updatePassword', 'UserController@updatePassword'); 
    });
});