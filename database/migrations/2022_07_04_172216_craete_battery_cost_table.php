<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteBatteryCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery', function (Blueprint $table) {
            $table->id();
            $table->double('battery_capacity_5g_type_a');
            $table->double('battery_consumption_5g_type_a');
            $table->double('battery_capacity_5g_type_b');
            $table->double('battery_consumption_5g_type_b');
            $table->double('battery_capacity_5g_type_c');
            $table->double('battery_consumption_5g_type_c');

            $table->double('battery_capacity_nb_type_a');
            $table->double('battery_consumption_nb_type_a');
            $table->double('battery_capacity_nb_type_b');
            $table->double('battery_consumption_nb_type_b');
            $table->double('battery_capacity_nb_type_c');
            $table->double('battery_consumption_nb_type_c');

            $table->double('battery_capacity_lora_type_a');
            $table->double('battery_consumption_lora_type_a');
            $table->double('battery_capacity_lora_type_b');
            $table->double('battery_consumption_lora_type_b');
            $table->double('battery_capacity_lora_type_c');
            $table->double('battery_consumption_lora_type_c');

            $table->double('battery_capacity_lora_gateway_type_a');
            $table->double('battery_consumption_lora_gateway_type_a');
            $table->double('battery_capacity_lora_gateway_type_b');
            $table->double('battery_consumption_lora_gateway_type_b');

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
        Schema::dropIfExists('Sensors');
    }
}
