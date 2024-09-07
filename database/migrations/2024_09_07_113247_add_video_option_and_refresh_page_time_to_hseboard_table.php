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
        Schema::table('hseboard', function (Blueprint $table) {
            //
            $table->integer('refresh_page_time')->nullable();
            $table->boolean('video_option')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hseboard', function (Blueprint $table) {
            //
            $table->dropColumn('video_option');
            $table->dropColumn('refresh_page_time');
        });
    }
};
