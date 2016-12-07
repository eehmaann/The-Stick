<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
     public function area() {
        return $this->belongsTo('App\Area');
    }
     public function workouts() {
        return $this->hasMany('App\Workout');
    } 
}
