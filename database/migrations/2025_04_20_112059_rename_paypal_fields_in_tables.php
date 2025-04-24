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
        // Rename fields in the payments table
        Schema::table('payments', function (Blueprint $table) {
            $table->renameColumn('paypal_order_id', 'order_id');
            $table->renameColumn('paypal_payment_id', 'payment_id');
        });
        
        // Rename fields in the bookings table
        Schema::table('bookings', function (Blueprint $table) {
            $table->renameColumn('paypal_order_id', 'order_id');
            $table->renameColumn('paypal_payment_id', 'payment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert changes in the payments table
        Schema::table('payments', function (Blueprint $table) {
            $table->renameColumn('order_id', 'paypal_order_id');
            $table->renameColumn('payment_id', 'paypal_payment_id');
        });
        
        // Revert changes in the bookings table
        Schema::table('bookings', function (Blueprint $table) {
            $table->renameColumn('order_id', 'paypal_order_id');
            $table->renameColumn('payment_id', 'paypal_payment_id');
        });
    }
};
