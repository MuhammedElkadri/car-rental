<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\ReservationController;


Route::get('/cars/{car}/book', [\App\Http\Controllers\Web\BookController::class, 'showBookingForm'])->name('cars.book');
Route::post('/cars/{car}/book', [\App\Http\Controllers\Web\BookController::class, 'processBooking'])->name('cars.book.submit');
Route::get('/', function () {
    return redirect()->route('home.index');
});
Route::get("/layout",function(){
    return view("car_rent.layouts.CERL");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/github', [SocialiteController::class, 'redirectToGithub'])->name('auth.github');
Route::get('/auth/github/callback', [SocialiteController::class, 'handleGithubCallback']);
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
require __DIR__.'/auth.php';

Route::resource('/home', HomeController::class);
Route::resource('/cars', CarController::class);
Route::resource('/dashboard', DashboardController::class);
Route::resource('/users', UserController::class); 
