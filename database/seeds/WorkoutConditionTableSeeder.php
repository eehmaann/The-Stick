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
        'miles' => ['Sore Quads', 'Marathon Recovery'],
        '4 X 400' => ['Broken Left Hand','Sharp Pain Back', 'Sore Quads' ],
        'backsquat' => ['Feeling Healthy'],
        '32 inch box jump'=> ['Broken Left Hand', 'Sore Quads']
    ];
    foreach($workouts as $workdescription => $conditions) {

        $workout = Workout::where('workdescription','like',$workdescription)->first();

        foreach($conditions as $conditionNote) {
            $condition = Condition::where('note','LIKE',$conditionNote)->first();

            $workout->conditions()->save($condition);
        }

    }
    }
}