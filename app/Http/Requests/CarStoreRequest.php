<?php

namespace App\Http\Requests;

use App\Models\Advertisement;
use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
        return [
            'car_id' => 'required|integer|exists:cars,id',
            'fuel_type_id' => 'required|integer|exists:fuel_types,id',
            'model_id' => 'required|integer|exists:car_models,id',
            'gear_id' => 'required|integer|exists:gears,id',
            'ban_id' => 'required|integer|exists:bans,id',
            'year' => 'required|integer|min:1904|max:' . date('Y'),
            'price' => 'required|integer|min:1|max:5000000',
            'distance' => 'required|integer|min:1|max:5000000',
            'vin_code' => 'required|string|min:0|max:500',
            'body' => 'required|string|min:0|max:500',
            'supplier_ids' => 'nullable|array',
            'supplers_ids.*' => 'nullable|integer|exists:car_suppliers,id',
            'photos' => 'required|array',
            'photos.*' => 'required|image|max:5000|mimes:png,jpg,jpeg'
        ];
    }
}
