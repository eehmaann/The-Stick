<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
      public function goal() {
        return $this->belongsTo('App\Goal');
    }
    public function conditions()
	{
    return $this->belongsToMany('App\Condition')->withTimestamps();
	}
}
