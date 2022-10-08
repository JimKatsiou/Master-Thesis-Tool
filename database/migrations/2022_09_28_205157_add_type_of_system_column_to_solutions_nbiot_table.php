<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfSystemColumnToSolutionsNbiotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nb_iot_solutions', function (Blueprint $table) {
            $table->string('technology_name')->after('number_of_nb_sensors_type_c');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nb_iot_solutions', function (Blueprint $table) {
            $table->dropColumn('technology_name');
        });
    }
}
