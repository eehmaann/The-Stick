<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectAreaAndGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
         Schema::table('goals', function (Blueprint $table) {


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
       Schema::table('goals', function (Blueprint $table) {

        # ref: http://laravel.com/docs/migrations#dropping-indexes
        # combine tablename + fk field name + the word "foreign"
        $table->dropForeign('goals_area_id_foreign');

        $table->dropColumn('area_id');
    });
    }
}
