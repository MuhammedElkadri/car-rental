<?php

namespace App\Models;

use App\Models\Review;
use App\Models\CarImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Car extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = ['id','created_at','updated_at'];
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

}
