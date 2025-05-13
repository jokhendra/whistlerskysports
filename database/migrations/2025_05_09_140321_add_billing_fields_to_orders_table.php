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
        Schema::table('orders', function (Blueprint $table) {
            // Add billing information fields - removed same_as_shipping as it exists already
            // $table->boolean('same_as_shipping')->default(true)->after('country');
            $table->string('billing_name')->nullable()->after('country');
            $table->string('billing_email')->nullable()->after('billing_name');
            $table->string('billing_phone')->nullable()->after('billing_email');
            $table->text('billing_address')->nullable()->after('billing_phone');
            $table->string('billing_city')->nullable()->after('billing_address');
            $table->string('billing_state')->nullable()->after('billing_city');
            $table->string('billing_postal_code')->nullable()->after('billing_state');
            $table->string('billing_country')->nullable()->after('billing_postal_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove all billing fields except same_as_shipping which is defined elsewhere
            $table->dropColumn([
                // 'same_as_shipping', - removed as it's defined in create_orders_table
                'billing_name',
                'billing_email',
                'billing_phone',
                'billing_address',
                'billing_city',
                'billing_state',
                'billing_postal_code',
                'billing_country'
            ]);
        });
    }
};
