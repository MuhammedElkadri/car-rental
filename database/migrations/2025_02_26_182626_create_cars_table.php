<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate')->unique();
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->integer('year')->unsigned();
            $table->decimal('price_per_hour', 8, 2);
            $table->decimal('price_per_day', 8, 2);
            $table->decimal('price_per_month', 8, 2);
            $table->integer('mileage');
            $table->enum('transmission', ['manual', 'automatic']);
            $table->integer('seats');
            $table->integer('luggage_capacity');
            $table->enum('fuel', ['petrol', 'diesel', 'electric', 'hybrid']);
            $table->decimal('fuel_efficiency', 5, 2)->comment('KM per liter');
            $table->string('location');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->text('description');
            
            // Features
            $table->boolean('sunroof')->default(false);
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('child_seat')->default(false);
            $table->boolean('gps')->default(false);
            $table->boolean('usb_ports')->default(false);
            $table->boolean('ABS')->default(false);
            $table->boolean('rear_view_camera')->default(false);
            $table->boolean('entertainment_system')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->boolean('onboard_computer')->default(false);
            $table->boolean('audio_input')->default(false);
            $table->boolean('remote_central_locking')->default(false);
            $table->boolean('parking_sensors')->default(false);
            $table->boolean('music')->default(false);
            $table->boolean('car_kit')->default(false); 
            // Status
            $table->enum('status', ['available', 'rented', 'maintenance', 'unavailable'])->default('available');
            $table->enum('insurance_status', ['valid', 'expired', 'pending'])->default('valid');
            $table->text('damage_status')->nullable();
            
            // Availability
            $table->date('availability_from')->nullable();
            $table->date('availability_to')->nullable();
            
            // Relations
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
