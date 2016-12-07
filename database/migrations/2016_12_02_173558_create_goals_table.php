<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('goals', function (Blueprint $table) {
    	
        $table->increments('id');
        $table->timestamps();
        $table->string('description'); // Any string based data
        $table->float('quantifier', 7, 2);  //Numerical expression of workout
        $table->float('starting_point', 7,2); // What can be done on day one
        $table->boolean('completed');
        $table->date('completed_on')->nullable();
    	});
    }
	
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goals'); 
    }
}
