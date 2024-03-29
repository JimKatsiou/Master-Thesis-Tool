<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteScenarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->string('technology_name');
            $table->string('type_of_system_name');
            $table->string('description')->default(null)->nullable();
            $table->unsignedBigInteger('technology_id')->unsigned();
            $table->foreign('technology_id')->references('id')->on('technologies');
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
        Schema::dropIfExists('scenarios');
    }
}
