<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id('id_pharmacy'); // Custom primary key
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->string('whatsapp');
            $table->text('operating_hours');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('facilities')->nullable(); // Laravel will enforce JSON validity
            $table->boolean('is_active')->default(true);
            $table->timestamps(); // includes created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
