<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\customAuthController;

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

 

 Route::GET('register','App\Http\Controllers\customAuthController@register'::class)->name('register');
 Route::GET('login','App\Http\Controllers\customAuthController@login'::class)->name('login');
 Route::POST('loginAction','App\Http\Controllers\customAuthController@loginAction'::class)->name('loginAction');

 
Route::middleware('CustomerAuth')->group(function(){
    Route::resource('customers',customAuthController::class);

});

//  auth test
// Route::middleware(['auth'])->group( function(){
//     Route::get('user',[userController::class,'dashboard'])->name('user');

// } );