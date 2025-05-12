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
        // Check if the columns exist before adding them
        if (!Schema::hasColumn('reviews', 'media_upload')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->string('media_upload')->nullable()->after('profile_picture')->comment('Path to uploaded media file');
            });
        }

        // Convert the existing profile_picture column description to be more accurate
        Schema::table('reviews', function (Blueprint $table) {
            // We can't directly modify a column comment, so we'll do it with DB statement
            DB::statement("ALTER TABLE `reviews` CHANGE COLUMN `profile_picture` `profile_picture` VARCHAR(255) NULL COMMENT 'Path to uploaded media file (legacy field)'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'media_upload')) {
                $table->dropColumn('media_upload');
            }
            
            // Revert the column comment
            DB::statement("ALTER TABLE `reviews` CHANGE COLUMN `profile_picture` `profile_picture` VARCHAR(255) NULL");
        });
    }
};
