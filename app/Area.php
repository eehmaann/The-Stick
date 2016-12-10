<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	   public function goals() {
        return $this->hasMany('App\Goal');
    } 
     public function workouts() {
        return $this->hasMany('App\Workout');
    } 
     public static function getAreaDropdown() {
        $areas = Area::orderBy('purpose', 'ASC')->get();
        $areas_for_dropdown = [];
        foreach($areas as $area) {
            $areas_for_dropdown[$area->id] = $area->purpose;
        }
        return $areas_for_dropdown;
    }
  
}
