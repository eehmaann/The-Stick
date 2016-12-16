<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\Goal;
use App\Area;
use App\Condition;
use App\User;
use Session;
use Auth;


class WorkoutController extends Controller
{
 
    public function index(Request $request)
    {
        $user = $request->user();
        if($user) {
        $workouts= Workout::where('user_id', '=', $user->id)->with('goal','area')->get();
        }
        else{
            $workouts=[];
        }
         return view('workout.index')->with([
            'workouts' => $workouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // get the list of goals the user has.
        $user = $request->user();
        if($user){
            $goals=Goal::where('user_id', '=', $user->id)->get();
        }
        // redirect to goals create if the user has no goals, so form can be completed.
        if(count($goals)==0){
           Session::flash('flash_message', 'You must have at least one goal before you can create workouts.');       
        return redirect('/goals/create');
        }
         $areas_for_dropdown = Area::getAreaDropdown();

         // Get user from auth
         $id = Auth::user()->id;
         $currentuser = User::find($id);
         // User Model to retrieve correct list for dropdown
         $goals_for_dropdown = Goal::getForDropdown($id);
        $conditions_for_checkboxes = Condition::getForCheckboxes();
        return view('workout.create')->with([
            'areas_for_dropdown' => $areas_for_dropdown,
            'goals_for_dropdown'=>$goals_for_dropdown,
             'conditions_for_checkboxes' => $conditions_for_checkboxes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'goal_id'=>'required',
            'workdescription' => 'required|min:3',
            'workquantifier' => 'required|min:1|numeric',
        ]);
 
        $workdescription = $request->input('workdescription');
        $workout = new Workout();
        $workout->workdescription = $request->input('workdescription');
        $workout->workquantifier = $request->input('workquantifier');
        $workout->area_id = $request->area_id;
        $workout->goal_id = $request->goal_id;
        $workout->user_id = $request->user()->id;
        $workout->save();

        $conditions = ($request->conditions) ?: [];
        $workout->conditions()->sync($conditions);
        $workout->save();
        
        Session::flash('flash_message', 'You have added a new workout.');       
        return redirect('/workouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $workout = Workout::find($id);
        if(is_null($workout)) {
            Session::flash('message','You did not do that workout!');
            return redirect('/workouts');
        }
        return view('workout.show')->with([
            'workout' => $workout,
        ]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workout = Workout::find($id);

     $areas_for_dropdown = Area::getAreaDropdown();
      // Get user from auth
         $id = Auth::user()->id;
         // User Model to retrieve correct list for dropdown
         $goals_for_dropdown = Goal::getForDropdown($id);
    $conditions_for_checkboxes = Condition::getForCheckboxes();

        $conditions_for_this_workout = [];
        foreach($workout->conditions as $condition) {
            $conditions_for_this_workout[] = $condition->note;
        }
        return view('workout.edit')->with([
            'workout'=>$workout,
            'areas_for_dropdown' => $areas_for_dropdown,
            'goals_for_dropdown'=>$goals_for_dropdown,
             'conditions_for_checkboxes' => $conditions_for_checkboxes,
             'conditions_for_this_workout' => $conditions_for_this_workout,
            ]
        ); //
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
            'workdescription' => 'required|min:3',
            'workquantifier' => 'required|min:1|numeric',
        ]);

        $workout = Workout::find($request->id);
        $workout->workdescription=$request->workdescription;
        $workout->workquantifier=$request->workquantifier;
        $workout->goal_id=$request->goal_id;
        $workout->area_id=$request->area_id;

        if($request->conditions){
            $conditions=$request->conditions;
        }
        else{
            $conditions = [];
        }
        $workout->conditions()->sync($conditions);
        $workout->save();

        Session::flash('flash_message', 'Your changes have been saved.');
        return redirect ('/workouts');
    }

         /**
    * GET
    * Page to confirm deletion
    */
    public function delete($id) {
        $workout = Workout::find($id);
        return view('workout.delete')->with('workout', $workout);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $workout = Workout::find($id);
        if(is_null($workout)) {
            Session::flash('message','There was no workout to delete.');
            return redirect('/workouts');
        }
        if($workout->conditions()) {
            $workout->conditions()->detach();
        }
        $workout->delete();
        # Finish
        Session::flash('flash_message', ' Your workout was deleted, enter another one.');
        return redirect('/workouts');//
    }
}
