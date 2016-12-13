<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function create()
    {
        return view('condition.create');
    
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
            'note' => 'required|min:3',
        ]);
        
        $note = $request->input('note'); 
        $condition = new Condition();
        $condition->note = $request->input('note');
        $condition->save();
        Session::flash('flash_message', 'You have recorded a new condition.');
        return redirect('/workout/create');
//
    }  //
}
