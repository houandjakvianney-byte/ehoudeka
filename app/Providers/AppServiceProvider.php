<?php

namespace App\Providers;

use App\Models\Trip;
use App\Policies\TripPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

   public function boot(): void
{
    Gate::policy(Trip::class, TripPolicy::class);

    \Carbon\Carbon::setLocale('fr');
    setlocale(LC_TIME, 'fr_FR.UTF-8');
}
}