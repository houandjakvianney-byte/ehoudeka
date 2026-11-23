<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Compte de démonstration principal
        $demo = User::create([
            'prenom'    => 'Kodjo',
            'nom'       => 'AMOUZOU',
            'telephone' => '+228 90 00 00 00',
            'email'     => 'kodjo@ehoudeka.test',
            'password'  => Hash::make('password'),
        ]);

        Vehicle::factory()->for($demo)->create([
            'plaque'      => 'AB-123-CD',
            'description' => 'Toyota Yaris - Blanc. Climatisé, 4 places passagers, coffre moyen.',
        ]);

        Trip::factory()->for($demo)->count(3)->create();
        Trip::factory()->for($demo)->past()->count(2)->create();

        // 2. Compte sans véhicule 
        User::create([
            'prenom'    => 'Ayélé',
            'nom'       => 'MENSAH',
            'telephone' => '+228 92 22 22 22',
            'email'     => 'ayele@ehoudeka.test',
            'password'  => Hash::make('password'),
        ]);

        // 3. Autres conducteurs avec véhicule et trajets 
        User::factory()
            ->count(8)
            ->has(Vehicle::factory())
            ->has(Trip::factory()->count(2))
            ->create();
    }
}