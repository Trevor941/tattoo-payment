<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/manager', function () {
//     return view('index');
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/tattoos', [App\Http\Controllers\TattoosController::class, 'index'])->name('tattoos.list');
// Route::get('/piercings', [App\Http\Controllers\PiercingsController::class, 'index'])->name('piercings.list');
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->prefix('dashboard')->group(function ()    {
    Route::get('/', function () {
        return view('index');
    });
    Route::prefix('/tattoos')->group(function () {
        Route::get('/list', [App\Http\Controllers\TattoosController::class, 'index'])->name('tattoos.list');   
        Route::get('/add', [App\Http\Controllers\TattoosController::class, 'add'])->name('tattoos.add');      
    });
    Route::prefix('/piercings')->group(function () {
        Route::get('/list', [App\Http\Controllers\PiercingsController::class, 'index'])->name('piercings.list');   
        Route::get('/add', [App\Http\Controllers\PiercingsController::class, 'add'])->name('piercings.add');      
    });
    Route::prefix('/orders')->group(function () {
        Route::get('/list', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.list');  
        Route::get('/list/{id}', [App\Http\Controllers\OrdersController::class, 'singleorder'])->name('orders.list.single'); 
    });
   
    Route::prefix('/appointments')->group(function () {
        Route::get('/', [App\Http\Controllers\AppointmentsController::class, 'index'])->name('appointments.index');   
        Route::post('/', [App\Http\Controllers\AppointmentsController::class, 'store'])->name('appointments.store');      
    });

    Route::get('/stripe-payment', [App\Http\Controllers\StripeController::class, 'index'])->name('stripe-form');
    Route::post('/stripe-payment', [App\Http\Controllers\StripeController::class, 'handlePost'])->name('stripe.payment');
    Route::get('/cart','App\Http\Controllers\CartController@cart')->name('cart');
    Route::post('/addtocart/{id}','App\Http\Controllers\CartController@addtocart')->name('addtocart');
    Route::post('/addtocartmanually','App\Http\Controllers\CartController@addToCartManually')->name('addtocartmanually');
    Route::post('/updatecart','App\Http\Controllers\CartController@updatecart')->name('updatecart');
   Route::post('/removefromcart','App\Http\Controllers\CartController@removefromcart')->name('removefromcart');
   Route::get('/checkout','App\Http\Controllers\Store\OrdersController@checkout')->name('checkout');
});