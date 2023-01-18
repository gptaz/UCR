<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ManageController;

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
})->name('home');
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('device',DeviceController::class);
Route::resource('customer',CustomerController::class);
Route::resource('rental',RentalController::class);
Route::resource('staff',StaffController::class);
Route::resource('view',ViewController::class);
Route::resource('manage',ManageController::class);
Route::post('/profile/{id}',[CustomerController::class,'profileUpdate'])->name('profileupdate');
Route::get('/addfund',[CustomerController::class,'addFund'])->name('addfund');
Route::get('/search',[ViewController::class,'search'])->name('search');
Route::get('/returnrental',[CustomerController::class,'returnrental'])->name('returnrental');
Route::get('/returning/{id}',[CustomerController::class,'returning'])->name('returning');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
