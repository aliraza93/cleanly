<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->double('hours');
            $table->double('base');
            $table->integer('increment');
            $table->double('two_bath')->nullable();
            $table->double('three_bath')->nullable();
            $table->double('four_bath')->nullable();
            $table->double('five_bath')->nullable();
            $table->double('six_bath')->nullable();
            $table->double('seven_bath')->nullable();
            $table->double('eight_bath')->nullable();
            $table->double('nine_bath')->nullable();
            $table->double('ten_bath')->nullable();
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
        Schema::dropIfExists('rates');
    }
}
