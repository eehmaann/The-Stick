<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(GoalssTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);
        $this->call(WorkoutConditionTableSeeder::class);
    }
}
