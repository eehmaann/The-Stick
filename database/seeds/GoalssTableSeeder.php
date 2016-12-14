<?php

use Illuminate\Database\Seeder;
use App\Area;

class GoalssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$area_id = Area::where('purpose','=','running distance')->pluck('id')->first();
         DB::table('goals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'area_id' => $area_id,
        'description' => 'run a marathon',
        'quantifier' => 26,
        'starting_point' => 10,
       'completed'=>True,
       'completed_on'=> Carbon\Carbon::now()->toDateTimeString(),
       'user_id' => 1,
    ]);
	$area_id = Area::where('purpose','=','running pace')->pluck('id')->first();
     DB::table('goals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'area_id' => $area_id,
        'description' => 'run 8 miles at pace',
        'quantifier' => 9,
        'starting_point' => 11,
       'completed'=>False,
       'completed_on'=> null,
       'user_id' => 1,
    ]);
	$area_id = Area::where('purpose','=','lift')->pluck('id')->first();
   DB::table('goals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'area_id' => $area_id,
        'description' => 'backsquat',
        'quantifier' => 252,
        'starting_point' => 190,
       'completed'=>False,
       'completed_on'=> null,
       'user_id' => 1,
    ]);//
    }
}
