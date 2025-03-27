<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showBookingForm($carId)
    {
        $car = Car::findOrFail($carId);
        $car->load('images');
        return view('car_rent.partials.booking.book', compact('car'));
    }

    public function storeBooking(Request $request, Car $car)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'time' => 'required',
        ]);

        // Create a new booking
        $booking = new Book();
        $booking->car_id = $car->id;
        $booking->name = $validated['name'];
        $booking->phone = $validated['phone'];
        $booking->email = $validated['email'];
        $booking->address = $validated['address'];
        $booking->start_date = $validated['start_date'];
        $booking->end_date = $validated['end_date'];
        $booking->time = $validated['time'];
        $booking->status = 'pending'; // Default status
        $booking->save();

        // Redirect with success message
        return redirect()->route('cars.book.show', $car->id)->with('success', 'تم حجز السيارة بنجاح. سيتم التواصل معك قريباً.');
    }

    public function showBooking($carId)
    {
        $car = Car::findOrFail($carId);
        $car->load('images');
        return view('car_rent.partials.booking.show', compact('car'));
    }
}
