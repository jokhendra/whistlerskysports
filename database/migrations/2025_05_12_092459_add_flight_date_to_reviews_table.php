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
            // Add all missing columns that were in the error message
            if (!Schema::hasColumn('reviews', 'flight_date')) {
                $table->date('flight_date')->nullable()->after('profile_picture');
            }
            
            if (!Schema::hasColumn('reviews', 'aircraft_type')) {
                $table->json('aircraft_type')->nullable()->after('flight_date');
            }
            
            if (!Schema::hasColumn('reviews', 'instructor_rating')) {
                $table->integer('instructor_rating')->nullable()->after('aircraft_type');
            }
            
            if (!Schema::hasColumn('reviews', 'fun_rating')) {
                $table->integer('fun_rating')->nullable()->after('instructor_rating');
            }
            
            if (!Schema::hasColumn('reviews', 'safety_rating')) {
                $table->integer('safety_rating')->nullable()->after('fun_rating');
            }
            
            if (!Schema::hasColumn('reviews', 'likelihood')) {
                $table->integer('likelihood')->nullable()->after('safety_rating');
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
                'flight_date',
                'aircraft_type',
                'instructor_rating',
                'fun_rating',
                'safety_rating',
                'likelihood'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('reviews', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
