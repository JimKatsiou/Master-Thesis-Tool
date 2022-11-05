<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfSystemColumnToSolutionsLoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lora_solutions', function (Blueprint $table) {
            $table->string('type_of_system')->after('number_of_lora_gateways_type_b');
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
            $table->dropColumn('type_of_system');
        });
    }
}