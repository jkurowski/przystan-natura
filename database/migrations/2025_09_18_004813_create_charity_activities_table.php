<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('charity_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');                 // Tytuł wpisu
            $table->string('intro')->nullable();     // Jedno zdanie wstępu
            $table->string('image')->nullable();     // Ścieżka do obrazka
            $table->string('thumbnail')->nullable(); // Ścieżka do miniaturki
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('charity_activities');
    }
};
