<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function workouts() {
    return $this->belongsToMany('App\Workout')->withTimestamps();
}//
}
