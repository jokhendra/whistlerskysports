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
        Schema::table('reviews', function (Blueprint $table) {
            // Add has_social_media column if it doesn't exist
            if (!Schema::hasColumn('reviews', 'has_social_media')) {
                $table->string('has_social_media')->nullable()->after('likelihood');
            }
            
            // Add feedback column if it doesn't exist
            if (!Schema::hasColumn('reviews', 'feedback')) {
                $table->text('feedback')->nullable()->after('has_social_media');
            }
            
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('reviews', 'status')) {
                $table->string('status')->default('pending')->after('feedback');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Only drop columns if they exist
            $columns = [
                'has_social_media',
                'feedback',
                'status'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('reviews', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
