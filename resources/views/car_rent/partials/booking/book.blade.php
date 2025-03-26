@extends('layouts.app')

@section('content')
<div class="container">
    <h2>حجز السيارة:</h2>
    
    <form action="{{ route('cars.book', ['car' => $car->id]) }}" method="get">
        @csrf
        
        <div class="mb-3">
            <label for="start_date">تاريخ البدء</label>
            <input type="date" class="form-control" name="start_date" required>
        </div>
        
        <div class="mb-3">
            <label for="end_date">تاريخ الانتهاء</label>
            <input type="date" class="form-control" name="end_date" required>
        </div>
        
        <button type="submit" class="btn btn-primary">تأكيد الحجز</button>
    </form>
</div>
@endsection
