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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->string('provider')->default('paypal');
            $table->string('paypal_order_id');
            $table->string('paypal_payment_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->string('status');
            $table->string('payer_email')->nullable();
            $table->string('payer_name')->nullable();
            $table->string('payer_id')->nullable();
            $table->json('payment_details')->nullable();
            $table->timestamps();
            
            // Indexes for faster lookups
            $table->index('paypal_order_id');
            $table->index('paypal_payment_id');
            $table->index('status');
            $table->index('provider');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
}; 