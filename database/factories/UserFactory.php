<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password = null;

    public function definition(): array
    {
        return [
            'prenom'    => fake()->firstName(),
            'nom'       => strtoupper(fake()->lastName()),
            'telephone' => '+228 9' . fake()->numberBetween(0, 9) . ' ' . fake()->numerify('## ## ##'),
            'email'     => fake()->unique()->safeEmail(),
            'password'  => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}