<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	    public function goals() {
        return $this->hasMany('App\Goal');
    }
	    public function workouts() {
        return $this->hasMany('App\Workout');
    }
}
