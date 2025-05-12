<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Make booking_id nullable
            $table->foreignId('booking_id')->nullable()->change();
            
            // Check if order_id column already exists
            if (!Schema::hasColumn('payments', 'order_id')) {
                // Add order_id foreign key that can be nullable
                $table->foreignId('order_id')->nullable()->after('booking_id')
                    ->constrained()->onDelete('set null');
            }
            
            // Add payment type if it doesn't exist
            if (!Schema::hasColumn('payments', 'payment_type')) {
                $table->enum('payment_type', ['booking', 'order'])->default('booking')->after('provider');
            }
            
            // Add customer phone number if it doesn't exist
            if (!Schema::hasColumn('payments', 'payer_phone')) {
                $table->string('payer_phone')->nullable()->after('payer_name');
            }
            
            // Check if constraint already exists
            $constraints = DB::select("SHOW KEYS FROM payments WHERE Key_name = 'payment_target_constraint'");
            if (empty($constraints)) {
                // Ensure at least one payment target (booking or order) is set
                $table->unique(['booking_id', 'order_id'], 'payment_target_constraint');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Check if constraint exists
            $constraints = DB::select("SHOW KEYS FROM payments WHERE Key_name = 'payment_target_constraint'");
            if (!empty($constraints)) {
                // Remove constraint
                $table->dropUnique('payment_target_constraint');
            }
            
            // Remove columns if they exist
            $columnsToRemove = [];
            
            if (Schema::hasColumn('payments', 'payment_type')) {
                $columnsToRemove[] = 'payment_type';
            }
            
            if (Schema::hasColumn('payments', 'payer_phone')) {
                $columnsToRemove[] = 'payer_phone';
            }
            
            if (!empty($columnsToRemove)) {
                $table->dropColumn($columnsToRemove);
            }
            
            // Make booking_id required again
            $table->foreignId('booking_id')->nullable(false)->change();
        });
    }
};
