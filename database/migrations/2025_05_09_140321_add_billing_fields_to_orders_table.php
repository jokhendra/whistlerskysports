<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Safely adds billing fields only if they don't already exist
     */
    public function up(): void
    {
        // Skip this migration entirely if the table already has the billing fields
        // This prevents conflicts with fields that already exist in the create_orders_table migration
        if (Schema::hasColumn('orders', 'billing_name')) {
            return;
        }
        
        Schema::table('orders', function (Blueprint $table) {
            // These fields are already in the create_orders_table migration,
            // but we'll keep them here with a safety check in case someone runs migrations out of order
            if (!Schema::hasColumn('orders', 'billing_name')) {
                $table->string('billing_name')->nullable()->after('country');
            }
            
            if (!Schema::hasColumn('orders', 'billing_email')) {
                $table->string('billing_email')->nullable()->after('billing_name');
            }
            
            if (!Schema::hasColumn('orders', 'billing_phone')) {
                $table->string('billing_phone')->nullable()->after('billing_email');
            }
            
            if (!Schema::hasColumn('orders', 'billing_address')) {
                $table->text('billing_address')->nullable()->after('billing_phone');
            }
            
            if (!Schema::hasColumn('orders', 'billing_city')) {
                $table->string('billing_city')->nullable()->after('billing_address');
            }
            
            if (!Schema::hasColumn('orders', 'billing_state')) {
                $table->string('billing_state')->nullable()->after('billing_city');
            }
            
            if (!Schema::hasColumn('orders', 'billing_postal_code')) {
                $table->string('billing_postal_code')->nullable()->after('billing_state');
            }
            
            if (!Schema::hasColumn('orders', 'billing_country')) {
                $table->string('billing_country')->nullable()->after('billing_postal_code');
            }
        });
    }

    /**
     * Reverse the migrations.
     * 
     * This down method is intentionally empty because the fields are 
     * meant to be part of the orders table structure and shouldn't be removed.
     */
    public function down(): void
    {
        // No down migration - we want to keep these fields
        // The original table migration will handle removal if needed
    }
};
