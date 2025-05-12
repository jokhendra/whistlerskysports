<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('profile_picture')->nullable();
            $table->date('flight_date');
            $table->json('aircraft_type');
            $table->integer('instructor_rating');
            $table->integer('fun_rating');
            $table->integer('safety_rating');
            $table->integer('likelihood');
            $table->string('has_social_media')->nullable();
            $table->text('feedback');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}; 