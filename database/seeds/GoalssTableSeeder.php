<?php

use Illuminate\Database\Seeder;

class GoalssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('goals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'type' => 'running distance',
        'description' => 'miles',
        'quantifier' => 26,
        'starting_point' => 10,
       'completed'=>True,
       'completed_on'=> Carbon\Carbon::now()->toDateTimeString(),
    ]);

     DB::table('goals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'type' => 'running pace',
        'description' => 'min/ miles',
        'quantifier' => 9,
        'starting_point' => 11,
       'completed'=>False,
       'completed_on'=> null,
    ]);

   DB::table('goals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'type' => 'workout',
        'description' => 'backsquat',
        'quantifier' => 252,
        'starting_point' => 190,
       'completed'=>False,
       'completed_on'=> null,
    ]);//
    }
}
