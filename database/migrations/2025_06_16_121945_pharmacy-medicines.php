<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pharmacy_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pharmacy_id')->constrained('pharmacies', 'id_pharmacy')->onDelete('cascade');
            $table->foreignId('medicine_id')->constrained('medicines', 'id_medicine')->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->integer('price')->nullable(); // Allow different pricing per pharmacy
            $table->boolean('is_available')->default(true);
            $table->text('notes')->nullable(); // Special notes about the medicine at this pharmacy
            $table->timestamps();
            
            // Ensure unique combination of pharmacy and medicine
            $table->unique(['pharmacy_id', 'medicine_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_medicines');
    }
};