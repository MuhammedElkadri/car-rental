<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $carId = $this->route('car'); // جلب ID السيارة من الرابط إذا كان موجودًا
        return [
            'license_plate' => 'required|string|max:255|unique:cars,license_plate,' . ($carId ?? 'NULL') . ',id',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'color' => 'required|string|max:20',
            'year' => 'required|integer|min:1990|max:' . date('Y'),
            'price_per_hour' => 'required|numeric|min:0',
            'price_per_day' => 'required|numeric|min:0',
            'price_per_month' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'transmission' => 'required|in:manual,automatic',
            'seats' => 'required|integer|min:1|max:9',
            'luggage_capacity' => 'required|integer|min:0|max:10',
            'fuel' => 'required|in:petrol,diesel,electric,hybrid',
            'fuel_efficiency' => 'required|numeric|min:0|max:100',
            'location' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'description' => 'required|string',

            // الميزات (Features)
            'sunroof' => 'boolean',
            'air_conditioning' => 'boolean',
            'child_seat' => 'boolean',
            'gps' => 'boolean',
            'usb_ports' => 'boolean',
            'ABS' => 'boolean',
            'rear_view_camera' => 'boolean',
            'entertainment_system' => 'boolean',
            'bluetooth' => 'boolean',
            'onboard_computer' => 'boolean',
            'audio_input' => 'boolean',
            'remote_central_locking' => 'boolean',
            'parking_sensors' => 'boolean',

            // الحالة (Status)
            'status' => 'required|in:available,rented,maintenance,unavailable',
            'insurance_status' => 'required|in:valid,expired,pending',
            'damage_status' => 'nullable|string|max:500',

            // التوافر (Availability)
            'availability_from' => 'nullable|date|after_or_equal:today',
            'availability_to' => 'nullable|date|after:availability_from',

            // العلاقة مع المستخدم
            'user_id' => 'required|exists:users,id',
        ];
    }
}
