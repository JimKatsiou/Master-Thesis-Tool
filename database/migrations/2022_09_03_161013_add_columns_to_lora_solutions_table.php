<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLoraSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lora_solutions', function (Blueprint $table) {
            $table->string('gateways_type_a')->after('number_of_lora_sensors_type_c');
            $table->integer('number_of_lora_gateways_type_a')->default(null)->after('gateways_type_a');
            $table->string('gateways_type_b')->after('number_of_lora_gateways_type_a');
            $table->integer('number_of_lora_gateways_type_b')->default(null)->after('gateways_type_b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lora_solutions', function (Blueprint $table) {
            $table->dropColumn('gateways_type_a');
            $table->dropColumn('number_of_lora_gateways_type_a');
            $table->dropColumn('gateways_type_b');
            $table->dropColumn('number_of_lora_gateways_type_b');
        });
    }
}
