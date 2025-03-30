<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('media')->paginate(4);

        return view('car_rent.pages.cars.index', [
            "page_name" => "السيارات",
            "cars" => $cars
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()?->can('cars.create')) {
            return view('car_rent.pages.cars.create');
        }
        return redirect()->route('cars.index')->with('error', 'ليس لديك صلاحية لإضافة سيارة');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $car = Car::create($request->all());
        $lastPage = $car->paginate(4)->lastPage();

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
        $mainImage = $car->getMedia('car_images')->firstWhere('custom_properties.is_main', true) ?? $car->getMedia('car_images')->first();
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
        $car = Car::find($id);
        return view('car_rent.pages.cars.edit', ["page_name" => "تعديل السيارة", "car" => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $car->addMedia($image)->toMediaCollection('car_images');
            }
        }   
        return redirect()->route('cars.index')->with('success', 'تم تعديل السيارة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'تم حذف السيارة بنجاح');
    }

    public function setMain(string $carId, string $imageId)
    {
        $car = Car::find($carId);
        if (Auth::id() == $car->user_id ) {
            // إزالة الصورة الرئيسية السابقة
            $previousMainImage = $car->getMedia('car_images')->firstWhere('custom_properties.is_main', true);
            if ($previousMainImage) {
                $previousMainImage->setCustomProperty('is_main', false);
                $previousMainImage->save();
            }

            // تعيين الصورة الجديدة كرئيسية
            $newMainImage = $car->getMedia('car_images')->find($imageId);
            if ($newMainImage) {
                $newMainImage->setCustomProperty('is_main', true);
                $newMainImage->save();
            }
            
            
            return redirect()->route('cars.show', ['car' => $carId])->with('success', 'تم تعيين الصورة بنجاح');
        }
        return redirect()->route('cars.show', ['car' => $carId])->with('error', 'ليس لديك صلاحية لتغيين هذه الصورة');
    }
    public function destroyImage(string $carId, string $imageId)
    {
        $car = Car::find($carId);
        if (Auth::id() == $car->user_id || Auth::user()->hasRole('admin')) {
            $car->deleteMedia($imageId);
            return redirect()->route('cars.show', ['car' => $carId])->with('success', 'تم حذف الصورة بنجاح');
        }
        return redirect()->route('cars.show', ['car' => $carId])->with('error', 'ليس لديك صلاحية لحذف هذه الصورة');
    }
}
