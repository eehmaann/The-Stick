<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function workouts() {
    return $this->belongsToMany('App\Workout')->withTimestamps();
}//
 public static function getForCheckboxes()
    {
        $conditions = Condition::orderBy('note','ASC')->get();
        $conditions_for_checkboxes = [];
        foreach($conditions as $condition) {
            $conditions_for_checkboxes[$condition->id] = $condition->note;
        }
        return $conditions_for_checkboxes;
    }
}
