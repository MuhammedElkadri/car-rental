@extends('car_rent.layouts.CERL')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header text-center">احجز سيارتك الان</h5>
                <div class="card-body">
                    <form action="{{ route('cars.book.submit', ['car' => $car->id]) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">الاسم</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="name" name="name" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-md-2 col-form-label">الهاتف</label>
                            <div class="col-md-10">
                                <input class="form-control phone-mask" type="text" id="phone" name="phone" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">البريد الالكتروني</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" id="email" name="email" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-md-2 col-form-label">العنوان</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="address" name="address" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="start_date" class="col-md-2 col-form-label">  تاريخ البداية</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" id="start_date" name="start_date" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="end_date" class="col-md-2 col-form-label">تاريخ نهاية الحجز</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" id="end_date" name="end_date" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="time" class="col-md-2 col-form-label">  وقت الحجز</label>
                            <div class="col-md-10">
                                <input class="form-control" type="time" id="time" name="time" required />
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button type= " submit" class="btn btn-primary btn-lg w-100"  >حجز السيارة</button>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary btn-lg w-100">العودة للرئيسية</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection