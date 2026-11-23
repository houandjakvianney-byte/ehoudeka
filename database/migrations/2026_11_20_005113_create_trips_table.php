<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ville_depart', 100)->index();
            $table->string('lieu_depart', 255);
            $table->string('ville_arrivee', 100)->index();
            $table->string('lieu_arrivee', 255);
            $table->dateTime('depart_at')->index();
            $table->tinyInteger('places_disponibles')->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};