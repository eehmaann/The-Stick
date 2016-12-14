<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Goal;
use App\Area;
use App\Workout;
use App\Condition;
use Session; 

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals= Goal::with('area')->get();
         return view('goal.index')->with([
        'goals' => $goals
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      {
        $areas_for_dropdown = Area::getAreaDropdown();
        return view('goal.create')->with([
            'areas_for_dropdown' => $areas_for_dropdown
        ]);
    }
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             # Validate
        $this->validate($request, [
            'area_id' =>'required',
            'description' => 'required|min:3',
            'quantifier' => 'required|min:1|numeric',
            'starting_point' => 'required|min:1|numeric',
        ]);
        
        $description = $request->input('description'); 
        $goal = new Goal();
        $goal->description = $request->input('description');
        $goal->quantifier = $request->input('quantifier');
        $goal->starting_point = $request->input('starting_point');
        $goal->area_id = $request->area_id;
        $goal->completed = false;
        $goal->completed_on = null;
        //$goal->user_id = $request->user()->id;
        $goal->save();
        Session::flash('flash_message', 'You have added a new goal.');
        return redirect('/goals');
//
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {
         $goal = Goal::find($id);

     $areas_for_dropdown = Area::getAreaDropdown();

        return view('goal.edit')->with([
            'goal'=>$goal,
            'areas_for_dropdown' => $areas_for_dropdown,
            ]
        ); // //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'description' => 'required|min:3',
            'quantifier' => 'required|min:1|numeric',
            'starting_point' => 'required|min:1|numeric',
        ]);

        $goal = Goal::find($request->id);
        $goal->description=$request->description;
        $goal->quantifier=$request->quantifier;
        $goal->starting_point=$request->starting_point;
        $goal->area_id=$request->area_id;
        $goal->save();

        Session::flash('flash_message', 'Your changes have been saved.');
        return redirect ('/goals'); //
    }
    //Changes an uncomplete goal to a completed goal
    public function qapla($id){
        {
            $goal = Goal::find($id);
            $goal->completed=true;
            $goal->save();
           return redirect ('/goals');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $goal = Goal::find($id);
        if(is_null($goal)) {
            Session::flash('message','This is no Goal here.');
            return redirect('/goals');
        }
        return view('goal.show')->with([
            'goal' => $goal,
        ]);// //
    }
}
