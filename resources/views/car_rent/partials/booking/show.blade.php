@extends('car_rent.layouts.CERL')

@section('content')
<div class="container">
    <h1>{{ $car->name }}</h1>
    <p>النوع: {{ $car->type }}</p>
    <p>السعر: {{ $car->price }} ليرة/يوم</p>

    <p>التفاصيل: {{ $car->description }}</p>
    <p>الصورة: <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" width="300"></p>


</div>
@endsection