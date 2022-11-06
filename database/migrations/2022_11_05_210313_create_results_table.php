<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('simulation_nubmer');
            $table->string('simulation_name')->nullable();;
            $table->string('technology'); //solution
            $table->string('type_of_system');
            $table->string('execution_date');

            $table->integer('cheapest_5g_solutionTableCost')->nullable();;
            $table->integer('cheapest_5g_solutionTable')->nullable();;

            $table->integer('cheapest_lora_solutionTableCost')->nullable();;
            $table->integer('cheapest_lora_solutionTable')->nullable();;

            $table->integer('cheapest_nb_solutionTableCost')->nullable();;
            $table->integer('cheapest_nb_solutionTable')->nullable();;

            $table->integer('best_5g_solutionTableBL')->nullable();;
            $table->integer('best_5g_solutionTable')->nullable();;

            $table->integer('best_lora_gateway_solutionTableBL')->nullable();;
            $table->integer('best_lora_gateway_solutionTableBL_sensorsBL')->nullable();;
            $table->integer('best_lora_solutionTableBL')->nullable();;
            $table->integer('best_lora_solutionTableBL_GatewaysBL')->nullable();;
            $table->integer('best_lora_gateway_solutionTable')->nullable();;
            $table->integer('best_lora_solutionTable')->nullable();;

            $table->integer('best_nb_solutionTableBL')->nullable();;
            $table->integer('best_nb_solutionTable')->nullable();;

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
        Schema::dropIfExists('results');
    }
}
