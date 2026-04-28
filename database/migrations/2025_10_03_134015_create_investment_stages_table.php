<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investment_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('date'); // jeśli wolisz typ daty: $table->date('date');
            $table->unsignedDecimal('percent', 5, 2)->default(0); // np. 25.50%
            $table->foreignId('gallery_id')->nullable()->constrained()->onDelete('set null');
            $table->unsignedInteger('position')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investment_stages');
    }
};
