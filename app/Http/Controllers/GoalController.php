<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Goal;
use App\Area;
use App\Workout;
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
            'description' => 'required|min:3',
            'quantifier' => 'required|min:1|numeric',
            'starting_point' => 'required|min:1|numeric',
        ]);
        #$title = $_POST['title']; # Option 1) Old way, don't do this.
        $title = $request->input('title'); # Option 2) USE THIS ONE! :)
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
        //
    }
}
