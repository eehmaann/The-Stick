<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectAreaAndWorkouts extends Migration
{
    public function up()
    {
         Schema::table('workouts', function (Blueprint $table) {
        $table->integer('area_id')->unsigned();

        $table->foreign('area_id')->references('id')->on('areas');

    });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('workouts', function (Blueprint $table) {
        $table->dropForeign('workouts_area_id_foreign');

        $table->dropColumn('area_id');
    });
    }
}
