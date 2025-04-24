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
            $table->string('waiver_pdf_path')->nullable()->after('signature_data');
            $table->string('waiver_reference_number')->nullable()->after('waiver_pdf_path');
            $table->timestamp('waiver_signed_at')->nullable()->after('waiver_reference_number');
            $table->string('waiver_status')->default('pending')->after('waiver_signed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'waiver_pdf_path',
                'waiver_reference_number',
                'waiver_signed_at',
                'waiver_status'
            ]);
        });
    }
};
