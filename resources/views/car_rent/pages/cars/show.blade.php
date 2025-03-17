@extends('car_rent.layouts.frontend')
@include('car_rent.partials.hero')

@section('content')

    <section class="ftco-section ftco-car-details">
        <!-- car details الصورة الرئسية مع الصور مع  التفاصيل الرئيسية -->
        @include('car_rent.partials.car-details.details')
        <!-- end car details -->


        <!-- Features Description Review -->
        <div class="row">
            <div class="col-md-12 pills">
                <div class="bd-example bd-example-tabs">

                    <!-- Features Description Review -->
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                    href="#pills-description" role="tab" aria-controls="pills-description"
                                    aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                    href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                    aria-expanded="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab"
                                    aria-controls="pills-review" aria-expanded="true">Review</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end Features Description Review -->


                    <div class="tab-content" id="pills-tabContent">
                        <!-- features -->
                        @include('car_rent.partials.car-details.features')
                        <!-- end features -->

                        <!-- description -->
                        <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel"
                            aria-labelledby="pills-manufacturer-tab">
                            <p>{{ $car->description }}</p>
                        </div>
                        <!-- end description -->

                        <!-- reviews -->
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="row">
                                @include('car_rent.partials.reviews')
                                @include('car_rent.partials.give-a-review')
                            </div>
                        </div>
                        <!-- end reviews -->



                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection