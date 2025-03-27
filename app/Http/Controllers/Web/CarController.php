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
        $cars = Car::paginate(4);
        
        return view('car_rent.pages.cars.index', ["page_name" => "السيارات", "cars" => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car_rent.pages.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = Car::create($request->all());
        $lastPage = $car->paginate(5)->lastPage();
    
        if ($request->hasFile('images')) {
            $isFirst = true; // متغير لتحديد الصورة الأولى
            foreach ($request->file('images') as $image) {
                if ($isFirst) {
                    // تعيين الصورة الأولى كرئيسية
                    $car->addMedia($image)
                        ->withCustomProperties(['is_main' => true])
                        ->toMediaCollection('car_images');
                    $isFirst = false; // تعطيل بعد الصورة الأولى
                } else {
                    // الصور الأخرى بدون علامة رئيسية
                    $car->addMedia($image)
                        ->toMediaCollection('car_images');
                }
            }
        }
    
        return redirect()->route('cars.index', ['page' => $lastPage])->with('success', 'تم إضافة السيارة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $car = Car::find($id);
        $reviews = Review::where('car_id', $id)->get();
        $average_rating = $reviews->avg('rating');
        $ratingCounts = $reviews->groupBy('rating')->map->count()->sortDesc();
        $mainImage = $car->getMedia('car_images')->firstWhere('custom_properties.is_main', true);
        return view(
            'car_rent.pages.cars.show',
            ["page_name" => "التفاصيل", "car" => $car, "reviews" => $reviews, "average_rating" => $average_rating, "ratingCounts" => $ratingCounts, "mainImage" => $mainImage]
        );
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
