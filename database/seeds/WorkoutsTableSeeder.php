<?php

use Illuminate\Database\Seeder;
use App\Goal;

class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$goal_id = Goal::where('type','=','running distance')->pluck('id')->first();
           DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'type' => 'running distance',
        'workdescription' => 'miles',
        'workquantifier' => 12,
         'goal_id' => $goal_id,
        ]);
        $goal_id = Goal::where('type','=','running pace')->pluck('id')->first();
       DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'type' => 'running pace',
        'workquantifier' => 10.5,  
        'workdescription' => '4 X 400',
        'goal_id' => $goal_id,
        ]);
        $goal_id = Goal::where('type','=','workout')->pluck('id')->first();
       DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'type' => 'workout',
        'workdescription' => 'backsquat',
        'workquantifier' => 200,
        'goal_id' => $goal_id,
        ]);
    }
}
