<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timings', function (Blueprint $table) {
            $table->id();
            $table->string('mon_start_time')->nullable();
            $table->string('mon_end_time')->nullable();
            $table->string('tues_start_time')->nullable();
            $table->string('tues_end_time')->nullable();
            $table->string('wednes_start_time')->nullable();
            $table->string('wednes_end_time')->nullable();
            $table->string('thurs_start_time')->nullable();
            $table->string('thurs_end_time')->nullable();
            $table->string('fri_start_time')->nullable();
            $table->string('fri_end_time')->nullable();
            $table->string('satur_start_time')->nullable();
            $table->string('satur_end_time')->nullable();
            $table->string('sun_start_time')->nullable();
            $table->string('sun_end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timings');
    }
}
