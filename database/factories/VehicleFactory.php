<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition(): array
    {
        $modeles = ['Toyota Yaris', 'Toyota Corolla', 'Peugeot 308', 'Hyundai Accent', 'Kia Rio', 'Suzuki Swift'];
        $couleurs = ['Blanc', 'Gris', 'Noir', 'Bleu', 'Rouge'];

        return [
            'user_id'     => User::factory(),
            'plaque'      => strtoupper(fake()->bothify('??-###-??')),
            'description' => fake()->randomElement($modeles) . ' - ' . fake()->randomElement($couleurs)
                . '. Climatisé, coffre moyen, conduite souple.',
            'photo_path'  => null, // image par défaut
        ];
    }
}