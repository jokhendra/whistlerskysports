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
        // Method 1: Add rating column if it doesn't exist
        if (!Schema::hasColumn('reviews', 'rating')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->integer('rating')->default(5)->after('feedback')->comment('Legacy overall rating field');
            });
        }

        // Method 2: If rating column exists but has no default, modify it
        if (Schema::hasColumn('reviews', 'rating')) {
            // This will modify the existing rating column to have a default value
            Schema::table('reviews', function (Blueprint $table) {
                $table->integer('rating')->default(5)->change();
            });
        }

        // Update the model to include the rating field
        $this->updateReviewModel();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // We don't remove the rating column in down migration as it might be used by existing reviews
            // Instead, we just remove the default value
            if (Schema::hasColumn('reviews', 'rating')) {
                $table->integer('rating')->nullable()->change();
            }
        });
    }

    /**
     * Update the Review model to include the rating field in the fillable array
     */
    private function updateReviewModel()
    {
        $modelPath = app_path('Models/Review.php');
        if (file_exists($modelPath)) {
            $content = file_get_contents($modelPath);
            
            // Check if 'rating' is already in the fillable array
            if (!str_contains($content, "'rating'")) {
                // Add rating to the fillable array
                $content = preg_replace(
                    "/(protected \\\$fillable = \[.*?)'status'/s",
                    "$1'status',\n        'rating'",
                    $content
                );
                
                file_put_contents($modelPath, $content);
            }
        }
    }
};
