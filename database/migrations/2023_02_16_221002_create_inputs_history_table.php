<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs_history', function (Blueprint $table) {
            $table->id();
            $table->string('simulation_nubmer');
            $table->string('simulation_name')->nullable();;
            $table->string('technology'); //solution
            $table->string('type_of_system');
            $table->string('execution_date');

            $table->string('five_g_sensors_type_a')->nullable();
            $table->integer('numberOf5gSensorsTypeA')->nullable();
            $table->string('five_g_sensors_type_b')->nullable();
            $table->integer('numberOf5gSensorsTypeB')->nullable();
            $table->string('five_g_sensors_type_c')->nullable();
            $table->integer('numberOf5gSensorsTypeC')->nullable();

            $table->string('lora_sensors_type_a')->nullable();
            $table->integer('numberOfLoraSensorsTypeA')->nullable();
            $table->string('lora_sensors_type_b')->nullable();
            $table->integer('numberOfLoraSensorsTypeB')->nullable();
            $table->string('lora_sensors_type_c')->nullable();
            $table->integer('numberOfLoraSensorsTypeC')->nullable();

            $table->string('gateways_type_a')->nullable();
            $table->integer('numberOfGatewaysTypeA')->nullable();
            $table->string('gateways_type_b')->nullable();
            $table->integer('numberOfGatewaysTypeB')->nullable();


            $table->string('nb_sensors_type_a')->nullable();
            $table->integer('numberOfNBSensorsTypeA')->nullable();
            $table->string('nb_sensors_type_b')->nullable();
            $table->integer('numberOfNBSensorsTypeB')->nullable();
            $table->string('nb_sensors_type_c')->nullable();
            $table->integer('numberOfNBSensorsTypeC')->nullable();

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
        Schema::dropIfExists('inputs_history');
    }
}
