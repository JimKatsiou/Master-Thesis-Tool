<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteSolutionsNbiotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nb_iot_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('nb_sensors_type_a');
            $table->integer('number_of_nb_sensors_type_a');
            $table->string('nb_sensors_type_b');
            $table->integer('number_of_nb_sensors_type_b');
            $table->string('nb_sensors_type_c');
            $table->integer('number_of_nb_sensors_type_c');
            //$table->foreign('technology_name')->references('name')->on('technologies');
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
        Schema::dropIfExists('nb_iot_solutions');
    }
}
