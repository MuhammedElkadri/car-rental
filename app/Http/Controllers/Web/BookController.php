<?php

namespace App\Http\Controllers\Web;

use App\Models\Car;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    
    public function processBooking()
    {
        // Add your logic here

       
        return view('car_rent.partials.booking.t');

        
    }
    public function showBookingForm()
    {

        return view('car_rent.partials.booking.t');
    }
}   

