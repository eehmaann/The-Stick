<?php

use Illuminate\Database\Seeder;
use App\Condition;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Feeling Healthy','Marathon Recovery','Sore Quads','Sharp Pain Back','Broken Left Hand'];

    foreach($data as $conditionNote) {
        $condition = new Condition();
        $condition->note = $conditionNote;
        $condition->save();
    } //
    }
}
