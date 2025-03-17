<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
    <div class="row">
        <!-- العمود الأول -->
        <div class="col-md-4">
            <ul class="features">
                <li class="{{ $car->air_conditioning ? 'check' : 'remove' }}">
                    <span class="{{ $car->air_conditioning ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Air Conditioning
                </li>
                <li class="{{ $car->child_seat ? 'check' : 'remove' }}">
                    <span class="{{ $car->child_seat ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Child Seat
                </li>
                <li class="{{ $car->gps ? 'check' : 'remove' }}">
                    <span class="{{ $car->gps ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> GPS
                </li>
                <li class="{{ $car->usb_ports ? 'check' : 'remove' }}">
                    <span class="{{ $car->usb_ports ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> USB Ports
                </li>
                <li class="{{ $car->ABS ? 'check' : 'remove' }}">
                    <span class="{{ $car->ABS ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> ABS
                </li>
            </ul>
        </div>

        <!-- العمود الثاني -->
        <div class="col-md-4">
            <ul class="features">
                <li class="{{ $car->rear_view_camera ? 'check' : 'remove' }}">
                    <span class="{{ $car->rear_view_camera ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Rear View Camera
                </li>
                <li class="{{ $car->entertainment_system ? 'check' : 'remove' }}">
                    <span class="{{ $car->entertainment_system ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Entertainment System
                </li>
                <li class="{{ $car->bluetooth ? 'check' : 'remove' }}">
                    <span class="{{ $car->bluetooth ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Bluetooth
                </li>
                <li class="{{ $car->onboard_computer ? 'check' : 'remove' }}">
                    <span class="{{ $car->onboard_computer ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Onboard Computer
                </li>
                <li class="{{ $car->audio_input ? 'check' : 'remove' }}">
                    <span class="{{ $car->audio_input ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Audio Input
                </li>
            </ul>
        </div>

        <!-- العمود الثالث -->
        <div class="col-md-4">
            <ul class="features">
                <li class="{{ $car->remote_central_locking ? 'check' : 'remove' }}">
                    <span class="{{ $car->remote_central_locking ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Remote Central Locking
                </li>
                <li class="{{ $car->parking_sensors ? 'check' : 'remove' }}">
                    <span class="{{ $car->parking_sensors ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Parking Sensors
                </li>
                <li class="{{ $car->sunroof ? 'check' : 'remove' }}">
                    <span class="{{ $car->sunroof ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Sunroof
                </li>
                <li class="{{ $car->music ? 'check' : 'remove' }}">
                    <span class="{{ $car->music ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Music
                </li>
                <li class="{{ $car->car_kit ? 'check' : 'remove' }}">
                    <span class="{{ $car->car_kit ? 'ion-ios-checkmark' : 'ion-ios-close' }}"></span> Car Kit
                </li>
            </ul>
        </div>
    </div>
</div>
