<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfSystemColumnToSolutions5gTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('five_g_solutions', function (Blueprint $table) {
            $table->string('technology_name')->after('number_of_5g_sensors_type_c');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('five_g_solutions', function (Blueprint $table) {
            $table->dropColumn('technology_name');
        });
    }
}
