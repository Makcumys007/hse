<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hseboard', function (Blueprint $table) {
            $table->id();
            $table->integer('lost_time_injuries');
            $table->integer('medical_treatment');
            $table->integer('first_aid_cases');
            $table->integer('lost_time_injuries_free_days');
            $table->integer('safe_men_hours');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hseboard');
    }
};
