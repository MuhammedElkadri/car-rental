<!-- تضمين الهيدر -->
@include('car_rent.partials.header')


<!-- قسم الهيرو الرئيسي مع خلفية ديناميكية -->
<div class="hero-wrap ftco-degree-bg" style="background-image: url({{ asset('images/bg_1.jpg') }});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="content-wrapper w-100" style="z-index: 2;">
                <!-- المحتوى المتغير الذي سيتم استبداله بـ yield -->
                <div class="container flex-grow-1 py-5" >
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- يمكن إضافة فوتر أو سكربتات إضافية هنا إذا لزم الأمر -->
@include('car_rent.partials.loader')