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

 
//register
 Route::GET('register','App\Http\Controllers\customAuthController@register'::class)->name('register');
 Route::POST('registerAction','App\Http\Controllers\customAuthController@registerAction'::class)->name('registerAction');

//login
 Route::GET('login','App\Http\Controllers\customAuthController@login'::class)->name('login');
 Route::POST('loginAction','App\Http\Controllers\customAuthController@loginAction'::class)->name('loginAction');
//logout
 Route::GET('logout','App\Http\Controllers\customAuthController@logout'::class)->name('logout');


Route::middleware('customerAuth')->group(function(){
    Route::resource('customers',customAuthController::class);

});

//  auth test
// Route::middleware(['auth'])->group( function(){
//     Route::get('user',[userController::class,'dashboard'])->name('user');

// } );