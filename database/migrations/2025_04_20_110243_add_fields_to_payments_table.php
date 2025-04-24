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
            // Note: booking_id already exists as a foreign key in the original migration
            
            // Add refund-related fields
            $table->boolean('is_refunded')->default(false)->after('status');
            $table->decimal('refund_amount', 10, 2)->nullable()->after('is_refunded');
            $table->timestamp('refund_date')->nullable()->after('refund_amount');
            
            // Add provider response field
            $table->json('provider_response')->nullable()->after('payment_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('is_refunded');
            $table->dropColumn('refund_amount');
            $table->dropColumn('refund_date');
            $table->dropColumn('provider_response');
        });
    }
};
