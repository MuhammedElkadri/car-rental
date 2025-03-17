<?php

namespace App\Models;

use App\Models\Review;
use App\Models\CarImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'make',
        'color',
        'year',
        'price_per_hour',
        'price_per_day',
        'price_per_month',
        'mileage',
        'transmission',
        'seats',
        'luggage',
        'fuel',
        'description',
        'status',
        'user_id',

        
        
    ];
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function maintenance() {
        return $this->hasMany(Maintenance::class);
    }

}
