<?php

use Illuminate\Database\Seeder;
use App\Workout;
use App\Condition;


class WorkoutConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workouts =[
        'running distance' => ['Sore Quads', 'Marathon Recovery'],
        'running pace' => ['Broken Left Hand','Sharp Pain Back', 'Sore Quads' ],
        'workout' => ['Feeling Healthy']
    ];
    foreach($workouts as $type => $conditions) {

        $workout = Workout::where('type','like',$type)->first();

        foreach($conditions as $conditionNote) {
            $condition = Condition::where('note','LIKE',$conditionNote)->first();

            $workout->conditions()->save($condition);
        }

    }
    }
}