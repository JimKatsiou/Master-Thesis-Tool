<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteSolutions5gTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('five_g_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('five_g_sensors_type_a');
            $table->integer('number_of_5g_sensors_type_a');
            $table->string('five_g_sensors_type_b');
            $table->integer('number_of_5g_sensors_type_b');
            $table->string('five_g_sensors_type_c');
            $table->integer('number_of_5g_sensors_type_c');
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
        Schema::dropIfExists('five_g_solutions');
    }
}
