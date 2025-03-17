<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Review;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('car_rent.pages.cars.index',["page_name"=>"السيارات","cars"=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);  
        $reviews = Review::where('car_id', $id)->get();
        $average_rating = $reviews->avg('rating');
        $ratingCounts = $reviews->groupBy('rating')->map->count();
        return view('car_rent.pages.cars.show',
        ["page_name"=>"التفاصيل","car"=>$car,"reviews"=>$reviews,"average_rating"=>$average_rating,"ratingCounts"=>$ratingCounts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
