@extends('car_rent.layouts.CERL')
@section('content')
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Vehicle Registration</h5>
    <small class="text-muted float-end">Vehicle Details</small>
    </div>
    <div class="card-body">
    <form action="{{ route('cars.store', ['user_id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!-- Basic Information -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="name">Vehicle Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="My Toyota Camry" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="license-plate">License Plate</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="license-plate" name="license_plate" placeholder="ABC-123"
        required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="brand">Brand</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="brand" name="brand" placeholder="Toyota" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="model">Model</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="model" name="model" placeholder="Camry" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="color">Color</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="color" name="color" placeholder="Silver" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="year">Year</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="year" name="year" placeholder="2023" min="1900" max="2025"
        required />
      </div>
      </div>

      <!-- Pricing -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="price-hour">Price/Hour</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="price-hour" name="price_per_hour" step="0.01"
        placeholder="15.00" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="price-day">Price/Day</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="price-day" name="price_per_day" step="0.01" placeholder="50.00"
        required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="price-month">Price/Month</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="price-month" name="price_per_month" step="0.01"
        placeholder="1000.00" required />
      </div>
      </div>

      <!-- Specifications -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="mileage">Mileage (KM)</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="mileage" name="mileage" placeholder="15000" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="transmission">Transmission</label>
      <div class="col-sm-10">
        <select class="form-control" id="transmission" name="transmission" required>
        <option value="manual">Manual</option>
        <option value="automatic">Automatic</option>
        </select>
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="seats">Seats</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="seats" name="seats" placeholder="5" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="luggage">Luggage Capacity</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="luggage" name="luggage_capacity" placeholder="400" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="fuel">Fuel Type</label>
      <div class="col-sm-10">
        <select class="form-control" id="fuel" name="fuel" required>
        <option value="petrol">Petrol</option>
        <option value="diesel">Diesel</option>
        <option value="electric">Electric</option>
        <option value="hybrid">Hybrid</option>
        </select>
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="fuel-efficiency">Fuel Efficiency (KM/L)</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="fuel-efficiency" name="fuel_efficiency" step="0.01"
        placeholder="15.50" required />
      </div>
      </div>

      <!-- Location -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="location">Location</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="location" name="location" placeholder="Downtown" required />
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Select Location</label>
      <div class="col-sm-10">
        <div id="map" style="height: 300px;"></div>
        <input type="hidden" id="latitude" name="latitude" />
        <input type="hidden" id="longitude" name="longitude" />
      </div>
      </div>

      <!-- Description -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="description">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="description" name="description" placeholder="Vehicle description..."
        required></textarea>
      </div>
      </div>

      <!-- Features -->
      <!-- Features Section -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Features</label>
      <div class="col-sm-10">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="sunroof" name="sunroof" value="1" />
        <label class="form-check-label" for="sunroof">Sunroof</label>
        <input type="hidden" name="sunroof" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="air_conditioning" name="air_conditioning" value="1" />
        <label class="form-check-label" for="air_conditioning">Air Conditioning</label>
        <input type="hidden" name="air_conditioning" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="child_seat" name="child_seat" value="1" />
        <label class="form-check-label" for="child_seat">Child Seat</label>
        <input type="hidden" name="child_seat" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gps" name="gps" value="1" />
        <label class="form-check-label" for="gps">GPS</label>
        <input type="hidden" name="gps" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="usb_ports" name="usb_ports" value="1" />
        <label class="form-check-label" for="usb_ports">USB Ports</label>
        <input type="hidden" name="usb_ports" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="ABS" name="ABS" value="1" />
        <label class="form-check-label" for="ABS">ABS</label>
        <input type="hidden" name="ABS" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="rear_view_camera" name="rear_view_camera" value="1" />
        <label class="form-check-label" for="rear_view_camera">Rear View Camera</label>
        <input type="hidden" name="rear_view_camera" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="entertainment_system" name="entertainment_system"
          value="1" />
        <label class="form-check-label" for="entertainment_system">Entertainment System</label>
        <input type="hidden" name="entertainment_system" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="bluetooth" name="bluetooth" value="1" />
        <label class="form-check-label" for="bluetooth">Bluetooth</label>
        <input type="hidden" name="bluetooth" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="onboard_computer" name="onboard_computer" value="1" />
        <label class="form-check-label" for="onboard_computer">Onboard Computer</label>
        <input type="hidden" name="onboard_computer" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="audio_input" name="audio_input" value="1" />
        <label class="form-check-label" for="audio_input">Audio Input</label>
        <input type="hidden" name="audio_input" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="remote_central_locking" name="remote_central_locking"
          value="1" />
        <label class="form-check-label" for="remote_central_locking">Remote Central Locking</label>
        <input type="hidden" name="remote_central_locking" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="parking_sensors" name="parking_sensors" value="1" />
        <label class="form-check-label" for="parking_sensors">Parking Sensors</label>
        <input type="hidden" name="parking_sensors" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="music" name="music" value="1" />
        <label class="form-check-label" for="music">Music</label>
        <input type="hidden" name="music" value="0" />
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="car_kit" name="car_kit" value="1" />
        <label class="form-check-label" for="car_kit">Car Kit</label>
        <input type="hidden" name="car_kit" value="0" />
        </div>
      </div>
      </div>

      <!-- Status -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="status">Status</label>
      <div class="col-sm-10">
        <select class="form-control" id="status" name="status" required>
        <option value="available">Available</option>
        <option value="rented">Rented</option>
        <option value="maintenance">Maintenance</option>
        <option value="unavailable">Unavailable</option>
        </select>
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="insurance">Insurance Status</label>
      <div class="col-sm-10">
        <select class="form-control" id="insurance" name="insurance_status" required>
        <option value="valid">Valid</option>
        <option value="expired">Expired</option>
        <option value="pending">Pending</option>
        </select>
      </div>
      </div>

      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="damage">Damage Status</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="damage" name="damage_status"
        placeholder="Any damage description..."></textarea>
      </div>
      </div>
      <!-- إضافة حقل الصور داخل النموذج -->
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="images">صور السيارة</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*" />
        <small class="form-text text-muted">يمكنك رفع عدة صور (JPEG, PNG, إلخ).</small>
      </div>
      </div>

      <div class="row justify-content-end">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Register Vehicle</button>
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
    // Initialize the map
    var map = L.map('map').setView([25.2048, 55.2708], 13); // Default to Dubai coordinates

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker
    var marker = L.marker([25.2048, 55.2708], { draggable: true }).addTo(map);

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

    // Set initial values
    document.getElementById('latitude').value = 25.2048;
    document.getElementById('longitude').value = 55.2708;
  </script>
@endsection