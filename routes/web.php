<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => ['is_admin', 'auth'], 'namespace' => 'App\\Http\\Controllers'], function () {
    Route::resource('user', UserController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => 'App\\Http\\Controllers', 'middleware' => 'auth'], function () {

    Route::post('/getDistrict', 'PersonController@getDistrict')->name('state.getDistrict');
    Route::post('/getMunicipality', 'PersonController@getMunicipality')->name('state.getMunicipality');

    Route::resource('state', StateController::class);
    Route::resource('district', DistrictController::class);
    Route::resource('municipality', MunicipalityController::class);
    Route::resource('person', PersonController::class);
});
