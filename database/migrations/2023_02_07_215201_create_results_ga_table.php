<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsGaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_ga', function (Blueprint $table) {
            $table->id();
            $table->string('simulation_nubmer');
            $table->string('simulation_name')->nullable();;
            $table->string('technology'); //solution
            $table->string('type_of_system');
            $table->string('execution_date');

            $table->integer('sensor_5g_a')->nullable();
            $table->integer('sensor_5g_b')->nullable();
            $table->integer('sensor_5g_c')->nullable();

            $table->integer('sensor_lora_a')->nullable();
            $table->integer('sensor_lora_b')->nullable();
            $table->integer('sensor_lora_c')->nullable();

            $table->integer('sensor_nb_a')->nullable();
            $table->integer('sensor_nb_b')->nullable();
            $table->integer('sensor_nb_c')->nullable();

            $table->double('solution_cost_5g')->nullable();
            $table->double('solution_cost_lora')->nullable();
            $table->double('solution_cost_nb')->nullable();

            $table->double('solution_battery_life_5g')->nullable();
            $table->double('solution_battery_life_lora')->nullable();
            $table->double('solution_battery_life_nb')->nullable();

            
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
        Schema::dropIfExists('results_ga');
    }
}
