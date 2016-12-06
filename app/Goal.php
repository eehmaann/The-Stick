<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
     public function workouts() {
        return $this->hasMany('App\Workout');
    } 
}
