<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecurityAndFlyingFieldsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Security fields
            $table->string('ip_address')->nullable()->after('order_id');
            $table->text('user_agent')->nullable()->after('ip_address');
            
            // Flying status fields
            $table->enum('flying_status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending')->after('status');
            $table->timestamp('flying_time')->nullable()->after('flying_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'ip_address',
                'user_agent',
                'flying_status',
                'flying_time'
            ]);
        });
    }
} 