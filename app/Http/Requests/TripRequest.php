<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ville_depart'       => ['required', 'string', 'max:100'],
            'lieu_depart'        => ['required', 'string', 'max:255'],
            'ville_arrivee'      => ['required', 'string', 'max:100'],
            'lieu_arrivee'       => ['required', 'string', 'max:255'],
            'depart_at'          => ['required', 'date', 'after:now'],
            'places_disponibles' => ['required', 'integer', 'min:1', 'max:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'ville_depart.required'       => 'La ville de départ est obligatoire.',
            'lieu_depart.required'        => 'La description du lieu de départ est obligatoire.',
            'ville_arrivee.required'      => 'La ville d\'arrivée est obligatoire.',
            'lieu_arrivee.required'       => 'La description du lieu d\'arrivée est obligatoire.',
            'depart_at.required'          => 'La date et l\'heure de départ sont obligatoires.',
            'depart_at.date'              => 'La date de départ doit être valide.',
            'depart_at.after'             => 'La date et l\'heure de départ doivent être postérieures à maintenant.',
            'places_disponibles.required' => 'Le nombre de places est obligatoire.',
            'places_disponibles.integer'  => 'Le nombre de places doit être un entier.',
            'places_disponibles.min'      => 'Le nombre de places doit être d\'au moins 1.',
            'places_disponibles.max'      => 'Le nombre de places ne peut pas dépasser 8.',
        ];
    }
}