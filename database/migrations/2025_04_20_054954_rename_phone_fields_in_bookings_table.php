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
        Schema::table('bookings', function (Blueprint $table) {
            $table->renameColumn('callback_phone', 'primary_phone');
            $table->renameColumn('oahu_phone', 'local_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->renameColumn('primary_phone', 'callback_phone');
            $table->renameColumn('local_phone', 'oahu_phone');
        });
    }
};
