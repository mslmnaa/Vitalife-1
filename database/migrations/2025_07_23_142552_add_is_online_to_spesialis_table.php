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
        // migration file
Schema::table('spesialis', function (Blueprint $table) {
    $table->boolean('is_online')->default(true); // default online
});

    }

    /**
     * Reverse the migrations.
     */
   
};
