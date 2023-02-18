<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bus\BusController;
use App\Http\Controllers\BusRoutes\RouteController;
use App\Http\Controllers\BuyTicket\BuyTicketController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PostYourRideController;
use App\Http\Controllers\Seat\SeatController;
use App\Http\Controllers\TimeTable\TimeTableController;
use App\Http\Controllers\User\UserController;

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

Route::get('/', [FrontendController::class, 'home'])->name('home');

// register
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'viewRegister'])->name('viewRegister');

// login
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin');

// forgot password
Route::get('/forgot-password', [AuthController::class, 'viewforgotPassword'])->name('viewforgotPassword');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

//verify email
Route::get('/verify-email', [AuthController::class, 'viewVerifyEmail'])->name('viewVerifyEmail');
Route::post('/verify-email', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

// reset password
Route::get('/reset-password', [AuthController::class, 'viewResetPassword'])->name('viewResetPassword');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');


// manage-my-accout
Route::get('/user', [FrontendController::class, 'manageMyAccount'])->name('manageMyAccount');
Route::post('/user/update-profile/{id}', [AuthController::class, 'updateProfile'])->name('update.profile');
Route::post('/user/change-password/{id}', [AuthController::class, 'changePassword']);

//my-rides
Route::get('/myrides', [FrontendController::class, 'myrides'])->name('myrides');

// search buses
Route::get('/search', [FrontendController::class, 'search'])->name('search');

// buy ticket
Route::post('/store-buy-ticket', [BuyTicketController::class, 'store'])->name('ticket.buy');

// payment info
//te::get('/payment-info', [BuyTicketController::class, 'paymentInfo'])->name('payment.info');

// seats
Route::get('/select-seats/{id}/{date}', [FrontendController::class, 'selectSeat'])->name('view.selectseats');

Route::post('/rating', [FrontendController::class, 'rating'])->name('rating');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
     // user authenticating routes

     // admin dashboard route
     Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

     //buses
     Route::get('/admin/buses', [AdminController::class, 'buses'])->middleware('can:view');
     Route::post('/admin/store-bus', [BusController::class, 'store'])->name('store.buses');
     Route::get('/admin/edit-bus/{id}', [BusController::class, 'edit'])->middleware('can:isAdmin')->name('edit.bus');
     Route::post('/admin/update-bus/{id}', [BusController::class, 'update'])->name('update.bus');
     Route::get('/admin/delete-bus/{id}', [BusController::class, 'destroy'])->middleware('can:isAdmin')->name('delete.bus');
     Route::get('/admin/change-bus-status/{id}', [BusController::class, 'changeStatus']);

     //bus routes
     Route::get('/admin/routes', [AdminController::class, 'routes']);
     Route::post('/admin/store-route', [RouteController::class, 'store'])->name('store.route');
     Route::get('/admin/edit-route/{id}', [RouteController::class, 'edit'])->middleware('can:isAdmin')->name('edit.route');
     Route::post('/admin/update-route/{id}', [RouteController::class, 'update'])->middleware('can:isAdmin')->name('update.route');
     Route::get('/admin/delete-route/{id}', [RouteController::class, 'destroy'])->middleware('can:isAdmin')->name('delete.route');
     Route::get('/admin/change-route-status/{id}', [RouteController::class, 'changeStatus'])->middleware('can:isAdmin');
     
    // buy ticket
    Route::get('/admin/tickets', [AdminController::class, 'tickets'])->middleware('can:isAdmin')->name('tickets');
   

    // add seat
    Route::post('/admin/add-seat/{bus_id}', [SeatController::class, 'store'])->name('store.seat');
    Route::get('/admin/seat/{bus_id}', [SeatController::class, 'create'])->middleware('can:isAdmin')->name('create.seat');

    //bookings
    Route::get('/admin/bookings', [AdminController::class, 'showBookings'])->middleware('can:isAdmin')->name('bookings');
    Route::get('/admin/change-pay-status/{id}', [AdminController::class, 'changePayStatus'])->middleware('can:isAdmin');
     
});
