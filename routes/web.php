<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\Foods\Userscontroller;
use App\Http\Controllers\Admins\AdminsController;

// Auth
Auth::routes();

// Home & Static Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Foods Routes
Route::group(['prefix' => 'foods'], function () {
    Route::get('/food-details/{id}', [FoodsController::class, 'foodDetails'])->name('food.details');
    Route::post('/food-details/{id}', [FoodsController::class, 'cart'])->name('food.cart');
    Route::get('/cart', [FoodsController::class, 'displayCartItems'])->name('food.display.cart');
    Route::get('/delete-cart/{id}', [FoodsController::class, 'deleteCartItems'])->name('food.delete.cart');
    Route::post('/bookings', [FoodsController::class, 'bookingtables'])->name('food.booking.table');
    Route::get('/menu', [FoodsController::class, 'menu'])->name('food.menu');
});

// Users
Route::get('/users/all-bookings', [Userscontroller::class, 'getBookings'])->name('users.bookings');
Route::get('/users/write-review', [Userscontroller::class, 'viewReview'])->name('users.review.create');
Route::post('/users/write-review', [Userscontroller::class, 'submitReview'])->name('users.review.store');

// Admin
Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login');
Route::post('admin/login', [AdminsController::class, 'checklogin'])->name('check.login');
Route::get('admin/index', [AdminsController::class, 'index'])->name('admins.dashboard')->middleware('auth:admin');
Route::get('all-admins', [AdminsController::class, 'allAdmins'])->name('admins.all')->middleware('auth:admin');
Route::get('admins-create', [AdminsController::class, 'createAdmins'])->name('admins.create');
Route::post('admins-create', [AdminsController::class, 'storeAdmins'])->name('admins.store');

// Bookings
Route::get('all-bookings', [AdminsController::class, 'allBookings'])->name('bookings.all');
Route::get('edit-bookings/{id}', [AdminsController::class, 'editBookings'])->name('bookings.edit');
Route::post('edit-bookings/{id}', [AdminsController::class, 'updateBookings'])->name('bookings.update');
Route::get('delete-bookings/{id}', [AdminsController::class, 'deleteBookings'])->name('bookings.delete');


