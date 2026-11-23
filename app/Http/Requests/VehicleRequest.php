<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'plaque'      => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:1000'],
            'photo'       => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:40960'], // 40 Mo
        ];
    }

    public function messages(): array
    {
        return [
            'plaque.required'      => 'Le numéro de plaque est obligatoire.',
            'plaque.max'           => 'Le numéro de plaque ne peut pas dépasser 20 caractères.',
            'description.required' => 'La description du véhicule est obligatoire.',
            'description.max'      => 'La description ne peut pas dépasser 1000 caractères.',
            'photo.required'       => 'La photo du véhicule est obligatoire.',
            'photo.image'          => 'Le fichier doit être une image.',
            'photo.mimes'          => 'Seuls les formats JPG, PNG et WebP sont acceptés.',
            'photo.max'            => 'La photo ne doit pas dépasser 40 Mo.',
        ];
    }
}