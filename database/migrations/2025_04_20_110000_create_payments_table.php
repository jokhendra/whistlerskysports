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
            $table->string('payment_order_id');
            $table->string('order_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('CAD');
            $table->string('status');
            $table->boolean('is_refunded')->default(false);
            $table->string('payer_email')->nullable();
            $table->string('payer_name')->nullable();
            $table->string('payer_id')->nullable();
            $table->json('provider_response')->nullable();
            $table->timestamps();
            
            // Indexes for faster lookups
            $table->index('payment_order_id');
            $table->index('payment_id');
            $table->index('order_id');
            $table->index('status');
            $table->index('provider');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->string('currency', 3)->default('CAD')->change();
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