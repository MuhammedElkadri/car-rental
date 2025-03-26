<?php

namespace App\Http\Controllers\Web;

use App\Models\Car;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    
    public function processBooking()
    {
        // Add your logic here

        $car = Car::findOrFail($car->id);
        $car->load('images');   
        return view('car_rent.partials.booking.book', compact('car'));

    }
    public function showBookingForm($carId)
    {
        $car = Car::findOrFail($carId);
        $car->load('images');
        return view('car_rent.partials.booking.book', compact('car'));
    }
}   

