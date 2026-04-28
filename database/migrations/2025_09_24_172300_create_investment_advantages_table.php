<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investment_advantages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id')
                ->constrained('investments')
                ->onDelete('cascade'); // usuwa atuty przy kasacji inwestycji
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->integer('position')->default(0);
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investment_advantages');
    }
};
