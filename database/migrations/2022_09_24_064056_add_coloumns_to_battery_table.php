<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColoumnsToBatteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battery', function (Blueprint $table) {
            $table->unsignedBigInteger('sensor_id')->unsigned()->nullable();
            $table->unsignedBigInteger('gateway_id')->unsigned()->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('battery', function (Blueprint $table) {
            $table->dropColumn('sensor_id');
            $table->dropColumn('gateway_id');
        });
    }
}
