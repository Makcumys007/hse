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
        Schema::create('gateboard', function (Blueprint $table) {
            $table->id();
            $table->integer('count_of_lti_year');
            $table->integer('lost_time_injuries_free_days');
            $table->string('running_string');
            $table->date('last_lti_date');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateboard');
    }
};
