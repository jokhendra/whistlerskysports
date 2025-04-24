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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('primary_phone');
            $table->string('timezone');
            $table->string('local_phone');
            $table->string('package');
            $table->text('flyer_details');
            $table->text('underage_flyers')->nullable();
            $table->date('preferred_dates');
            $table->string('sunrise_flight');
            $table->boolean('video_package')->default(false);
            $table->boolean('deluxe_package')->default(false);
            $table->integer('merch_package')->default(0);
            $table->text('accommodation')->nullable();
            $table->text('special_event')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('waiver_pdf_path')->nullable();
            $table->string('paypal_order_id')->nullable();
            $table->string('paypal_payment_id')->nullable();
            $table->string('status')->default('pending');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
