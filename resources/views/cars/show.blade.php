@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $car->name }}</h1>
    <p>النوع: {{ $car->type }}</p>
    <p>السعر: {{ $car->price }} ليرة/يوم</p>
    
    <a href="{{ route('cars.book', $car) }}" class="btn btn-success">احجز الآن</a>
</div>
@endsection