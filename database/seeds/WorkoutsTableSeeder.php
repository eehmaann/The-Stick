<?php

use Illuminate\Database\Seeder;
use App\Goal;
use App\Area;
class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$area_id = Area::where('purpose','=','running distance')->pluck('id')->first();
    	$goal_id = Goal::where('quantifier','=','26')->pluck('id')->first();
           DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'area_id' => $area_id,
        'workdescription' => 'miles',
        'workquantifier' => 12,
         'goal_id' => $goal_id,
         'user_id' => 1,
        ]);
       
        $area_id = Area::where('purpose','=','running pace')->pluck('id')->first();
        $goal_id = Goal::where('quantifier','=','9')->pluck('id')->first();
       DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'area_id' => $area_id,
        'workquantifier' => 10.5,  
        'workdescription' => '4 X 400',
        'goal_id' => $goal_id,
        'user_id' => 1,
        ]);
       
    	$area_id = Area::where('purpose','=','lift')->pluck('id')->first();
        $goal_id = Goal::where('quantifier','=','252')->pluck('id')->first();
       DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'area_id' => $area_id,
        'workdescription' => 'backsquat',
        'workquantifier' => 200,
        'goal_id' => $goal_id,
        'user_id' => 1,
        ]);
        
        $area_id = Area::where('purpose','=','lift')->pluck('id')->first();
        $goal_id = Goal::where('quantifier','=','26')->pluck('id')->first();
       DB::table('workouts')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'area_id' => $area_id,
        'workdescription' => '32 inch box jump',
        'workquantifier' => 180,
        'goal_id' => $goal_id,
        'user_id' => 1,
        ]);
    }
}
