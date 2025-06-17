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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('tripay_reference')->nullable()->after('payment_code');
            $table->string('tripay_merchant_ref')->nullable()->after('tripay_reference');
            $table->string('tripay_status')->nullable()->after('status');
            $table->text('payment_url')->nullable()->after('tripay_status');
            $table->json('payment_instructions')->nullable()->after('payment_url');
            $table->timestamp('expired_at')->nullable()->after('payment_instructions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn([
                'tripay_reference',
                'tripay_merchant_ref', 
                'tripay_status',
                'payment_url',
                'payment_instructions',
                'expired_at'
            ]);
        });
    }
};
