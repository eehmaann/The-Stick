<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Goal; 

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::all();

# Make sure we have results before trying to print them...
if(!$goals->isEmpty()) {

    # Output the books
    foreach($goals as $goal) {
        echo $goal->description.'<br>';
        echo $goal->quantifier.'<br>';
        echo $goal->starting_point.'<br>';
    }
}
else {
    echo 'GET SOME GOALS!';
}//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /*  $goal = new Goal();

        $goal->type = 'running distance';
        $goal->description = 'Run a half marathon without stopping';
        $goal->quantifier = 13;
        $goal->starting_point = 5;
        $goal->completed = 'FALSE';
        $goal->completed_on=> Carbon\Carbon::now()->toDateTimeString(),

        $goal->save();

        echo 'Added: '.$goal->description;//
        */
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
