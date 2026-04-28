<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('investment_selectfields', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type');          // identyfikator pola select
            $table->string('label');                  // etykieta (pole lub opcja)
            $table->string('value')->nullable();      // null = definicja pola select
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_selectfields');
    }
};
