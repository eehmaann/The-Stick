<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('workouts', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();
        $table->string('workdescription');      // what was the exercise
        $table->float('workquantifier', 7, 2); // number of miles ran, pace, load etc... 
       

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('workouts');
    }
}
