<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Bus\BusController;
use App\Http\Controllers\BusRoutes\RouteController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PostYourRideController;
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

// post your ride
Route::get('/post-your-ride', [PostYourRideController::class, 'index'])->name('postYourRide');
Route::post('/post-your-ride', [PostYourRideController::class, 'store'])->name('store.postYourRide');
Route::get('/post-your-ride/{id}', [PostYourRideController::class, 'show'])->name('showOne.postYourRide');
Route::post('/post-your-ride/{id}', [PostYourRideController::class, 'update'])->name('update.postYourRide');

// manage-my-accout
Route::get('/user', [FrontendController::class, 'manageMyAccount'])->name('manageMyAccount');
Route::post('/user/update-profile/{id}', [AuthController::class, 'updateProfile'])->name('update.profile');
Route::post('/user/change-password/{id}', [AuthController::class, 'changePassword']);

//my-rides
Route::get('/myrides', [FrontendController::class, 'myrides'])->name('myrides');

// search buses
Route::get('/search', [FrontendController::class, 'search'])->name('search');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
     // user authenticating routes

     // admin dashboard route
     Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

     //buses
     Route::get('/admin/buses', [AdminController::class, 'buses']);
     Route::post('/admin/store-bus', [BusController::class, 'store'])->name('store.buses');
     Route::get('/admin/edit-bus/{id}', [BusController::class, 'edit'])->name('edit.bus');
     Route::post('/admin/update-bus/{id}', [BusController::class, 'update'])->name('update.bus');
     Route::get('/admin/delete-bus/{id}', [BusController::class, 'destroy'])->name('delete.bus');
     Route::get('/admin/change-bus-status/{id}', [BusController::class, 'changeStatus']);

     //bus routes
     Route::get('/admin/routes', [AdminController::class, 'routes']);
     Route::post('/admin/store-route', [RouteController::class, 'store'])->name('store.route');
     Route::get('/admin/edit-route/{id}', [RouteController::class, 'edit'])->name('edit.route');
     Route::post('/admin/update-route/{id}', [RouteController::class, 'update'])->name('update.route');
     Route::get('/admin/delete-route/{id}', [RouteController::class, 'destroy'])->name('delete.route');
     Route::get('/admin/change-route-status/{id}', [RouteController::class, 'changeStatus']);
     

     
});
