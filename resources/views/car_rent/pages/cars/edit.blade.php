@extends('car_rent.layouts.CERL')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">تعديل السيارة</h5>
            <small class="text-muted float-end">تحديث تفاصيل السيارة</small>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.update', ['car' => $car->id,'user_id'=>$car->user_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="license-plate">لوحة الترخيص</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="license-plate" name="license_plate"
                               value="{{ old('license_plate', $car->license_plate) }}" required />
                        @error('license_plate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="brand">العلامة التجارية</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand" name="brand"
                               value="{{ old('brand', $car->brand) }}" required />
                        @error('brand')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="model">الطراز</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="model" name="model"
                               value="{{ old('model', $car->model) }}" required />
                        @error('model')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="color">اللون</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="color" name="color"
                               value="{{ old('color', $car->color) }}" required />
                        @error('color')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="year">سنة الصنع</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="year" name="year"
                               value="{{ old('year', $car->year) }}" min="1900" max="2025" required />
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Pricing -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="price-hour">السعر/الساعة</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price-hour" name="price_per_hour" step="0.01"
                               value="{{ old('price_per_hour', $car->price_per_hour) }}" required />
                        @error('price_per_hour')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="price-day">السعر/اليوم</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price-day" name="price_per_day" step="0.01"
                               value="{{ old('price_per_day', $car->price_per_day) }}" required />
                        @error('price_per_day')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="price-month">السعر/الشهر</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price-month" name="price_per_month" step="0.01"
                               value="{{ old('price_per_month', $car->price_per_month) }}" required />
                        @error('price_per_month')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Specifications -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="mileage">المسافة المقطوعة (كم)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="mileage" name="mileage"
                               value="{{ old('mileage', $car->mileage) }}" required />
                        @error('mileage')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="transmission">ناقل الحركة</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="transmission" name="transmission" required>
                            <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>يدوي</option>
                            <option value="automatic" {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>أوتوماتيكي</option>
                        </select>
                        @error('transmission')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="seats">عدد المقاعد</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="seats" name="seats"
                               value="{{ old('seats', $car->seats) }}" required />
                        @error('seats')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="luggage">سعة الأمتعة</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="luggage" name="luggage_capacity"
                               value="{{ old('luggage_capacity', $car->luggage_capacity) }}" required />
                        @error('luggage_capacity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="fuel">نوع الوقود</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="fuel" name="fuel" required>
                            <option value="petrol" {{ old('fuel', $car->fuel) == 'petrol' ? 'selected' : '' }}>بنزين</option>
                            <option value="diesel" {{ old('fuel', $car->fuel) == 'diesel' ? 'selected' : '' }}>ديزل</option>
                            <option value="electric" {{ old('fuel', $car->fuel) == 'electric' ? 'selected' : '' }}>كهربائي</option>
                            <option value="hybrid" {{ old('fuel', $car->fuel) == 'hybrid' ? 'selected' : '' }}>هجين</option>
                        </select>
                        @error('fuel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="fuel-efficiency">كفاءة الوقود (كم/لتر)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="fuel-efficiency" name="fuel_efficiency" step="0.01"
                               value="{{ old('fuel_efficiency', $car->fuel_efficiency) }}" required />
                        @error('fuel_efficiency')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Location -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="location">الموقع</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="location" name="location"
                               value="{{ old('location', $car->location) }}" required />
                        @error('location')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">اختر الموقع</label>
                    <div class="col-sm-10">
                        <div id="map" style="height: 300px;"></div>
                        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $car->latitude) }}" />
                        <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $car->longitude) }}" />
                        @error('latitude')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('longitude')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="description">الوصف</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" required>{{ old('description', $car->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Features -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">الميزات</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sunroof" name="sunroof" value="1"
                                   {{ old('sunroof', $car->sunroof) ? 'checked' : '' }} />
                            <label class="form-check-label" for="sunroof">فتحة سقف</label>
                            <input type="hidden" name="sunroof" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="air_conditioning" name="air_conditioning" value="1"
                                   {{ old('air_conditioning', $car->air_conditioning) ? 'checked' : '' }} />
                            <label class="form-check-label" for="air_conditioning">تكييف هواء</label>
                            <input type="hidden" name="air_conditioning" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="child_seat" name="child_seat" value="1"
                                   {{ old('child_seat', $car->child_seat) ? 'checked' : '' }} />
                            <label class="form-check-label" for="child_seat">مقعد أطفال</label>
                            <input type="hidden" name="child_seat" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gps" name="gps" value="1"
                                   {{ old('gps', $car->gps) ? 'checked' : '' }} />
                            <label class="form-check-label" for="gps">نظام تحديد المواقع</label>
                            <input type="hidden" name="gps" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="usb_ports" name="usb_ports" value="1"
                                   {{ old('usb_ports', $car->usb_ports) ? 'checked' : '' }} />
                            <label class="form-check-label" for="usb_ports">منافذ USB</label>
                            <input type="hidden" name="usb_ports" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ABS" name="ABS" value="1"
                                   {{ old('ABS', $car->ABS) ? 'checked' : '' }} />
                            <label class="form-check-label" for="ABS">نظام ABS</label>
                            <input type="hidden" name="ABS" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rear_view_camera" name="rear_view_camera" value="1"
                                   {{ old('rear_view_camera', $car->rear_view_camera) ? 'checked' : '' }} />
                            <label class="form-check-label" for="rear_view_camera">كاميرا رؤية خلفية</label>
                            <input type="hidden" name="rear_view_camera" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="entertainment_system" name="entertainment_system" value="1"
                                   {{ old('entertainment_system', $car->entertainment_system) ? 'checked' : '' }} />
                            <label class="form-check-label" for="entertainment_system">نظام ترفيه</label>
                            <input type="hidden" name="entertainment_system" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="bluetooth" name="bluetooth" value="1"
                                   {{ old('bluetooth', $car->bluetooth) ? 'checked' : '' }} />
                            <label class="form-check-label" for="bluetooth">بلوتوث</label>
                            <input type="hidden" name="bluetooth" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="onboard_computer" name="onboard_computer" value="1"
                                   {{ old('onboard_computer', $car->onboard_computer) ? 'checked' : '' }} />
                            <label class="form-check-label" for="onboard_computer">كمبيوتر داخلي</label>
                            <input type="hidden" name="onboard_computer" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="audio_input" name="audio_input" value="1"
                                   {{ old('audio_input', $car->audio_input) ? 'checked' : '' }} />
                            <label class="form-check-label" for="audio_input">مدخل صوت</label>
                            <input type="hidden" name="audio_input" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remote_central_locking" name="remote_central_locking" value="1"
                                   {{ old('remote_central_locking', $car->remote_central_locking) ? 'checked' : '' }} />
                            <label class="form-check-label" for="remote_central_locking">قفل مركزي عن بعد</label>
                            <input type="hidden" name="remote_central_locking" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="parking_sensors" name="parking_sensors" value="1"
                                   {{ old('parking_sensors', $car->parking_sensors) ? 'checked' : '' }} />
                            <label class="form-check-label" for="parking_sensors">حساسات ركن</label>
                            <input type="hidden" name="parking_sensors" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="music" name="music" value="1"
                                   {{ old('music', $car->music) ? 'checked' : '' }} />
                            <label class="form-check-label" for="music">موسيقى</label>
                            <input type="hidden" name="music" value="0" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="car_kit" name="car_kit" value="1"
                                   {{ old('car_kit', $car->car_kit) ? 'checked' : '' }} />
                            <label class="form-check-label" for="car_kit">مجموعة السيارة</label>
                            <input type="hidden" name="car_kit" value="0" />
                        </div>
                        @error('features')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Status -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">الحالة</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status" required>
                            <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>متاح</option>
                            <option value="rented" {{ old('status', $car->status) == 'rented' ? 'selected' : '' }}>مؤجر</option>
                            <option value="maintenance" {{ old('status', $car->status) == 'maintenance' ? 'selected' : '' }}>تحت الصيانة</option>
                            <option value="unavailable" {{ old('status', $car->status) == 'unavailable' ? 'selected' : '' }}>غير متاح</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="insurance">حالة التأمين</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="insurance" name="insurance_status" required>
                            <option value="valid" {{ old('insurance_status', $car->insurance_status) == 'valid' ? 'selected' : '' }}>سارٍ</option>
                            <option value="expired" {{ old('insurance_status', $car->insurance_status) == 'expired' ? 'selected' : '' }}>منتهي</option>
                            <option value="pending" {{ old('insurance_status', $car->insurance_status) == 'pending' ? 'selected' : '' }}>معلق</option>
                        </select>
                        @error('insurance_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="damage">حالة الأضرار</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="damage" name="damage_status">{{ old('damage_status', $car->damage_status) }}</textarea>
                        @error('damage_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Images -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="images">إضافة صور السيارة</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*" />
                        <small class="form-text text-muted">ارفع صورًا جديدة لاستبدال الصور الحالية (JPEG، PNG، إلخ).</small>
                        @error('images.*')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @if($car->getMedia('car_images'))
                            <div class="mt-2">
                                <p>الصور الحالية:</p>
                                @foreach($car->getMedia('car_images') as $image)
                                    <img src="{{ asset($image->getUrl()) }}" alt="صورة السيارة" style="max-width: 100px; margin: 5px;">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">تحديث معلومات السيارة</button>
                    @if ($errors->any())
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="errors">الأخطاء</label>
                        <div class="col-sm-10">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Initialize the map with existing coordinates or old values
        var initialLat = {{ old('latitude', $car->latitude) }};
        var initialLng = {{ old('longitude', $car->longitude) }};
        var map = L.map('map').setView([initialLat, initialLng], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker at existing position
        var marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);

        // Update hidden inputs when marker is moved
        marker.on('dragend', function (e) {
            var position = marker.getLatLng();
            document.getElementById('latitude').value = position.lat.toFixed(7);
            document.getElementById('longitude').value = position.lng.toFixed(7);
        });

        // Update marker position when clicking on map
        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat.toFixed(7);
            document.getElementById('longitude').value = e.latlng.lng.toFixed(7);
        });
    </script>
@endsection