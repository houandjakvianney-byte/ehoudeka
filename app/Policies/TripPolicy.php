<?php

namespace App\Policies;

use App\Models\Trip;
use App\Models\User;

class TripPolicy
{
    
     //Seul le propriétaire du trajet peut le supprimer 
     
    public function delete(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }
}