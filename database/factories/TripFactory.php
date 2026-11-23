<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    public function definition(): array
    {
        $lieux = [
            'Agoè, carrefour des 300 mètres',
            'Adidogomé, face à la station Total',
            'Tokoin, derrière l\'Université',
            'Bè, près de la pharmacie du marché',
            'Nyékonakpoè, rond-point',
            'Hédzranawoé, gare routière',
        ];

        return [
            'user_id'            => User::factory(),
            'ville_depart'       => 'Lomé',
            'lieu_depart'        => fake()->randomElement($lieux),
            'ville_arrivee'      => fake()->randomElement(['Lomé', 'Kpalimé', 'Aného', 'Tsévié', 'Atakpamé']),
            'lieu_arrivee'       => fake()->randomElement($lieux),
            'depart_at'          => fake()->dateTimeBetween('+1 hour', '+15 days'),
            'places_disponibles' => fake()->numberBetween(1, 4),
        ];
    }

    public function past(): static
    {
        return $this->state(fn () => [
            'depart_at' => fake()->dateTimeBetween('-10 days', '-1 day'),
        ]);
    }
}