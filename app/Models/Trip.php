<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ville_depart',
        'lieu_depart',
        'ville_arrivee',
        'lieu_arrivee',
        'depart_at',
        'places_disponibles',
    ];

    protected function casts(): array
    {
        return [
            'depart_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un trajet est "passé" si sa date de départ est antérieure à maintenant.
     */
    public function getIsPastAttribute(): bool
    {
        return $this->depart_at->isPast();
    }
}