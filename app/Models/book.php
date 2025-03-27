<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'car_id',
        'name',
        'phone',
        'email',
        'address',
        'start_date',
        'end_date',
        'time',
        'status',
    ];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
        
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
