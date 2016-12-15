<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Area;
use Session;

class AreaController extends Controller
{
  public function create()
    {
        return view('area.create');
    
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
            'purpose' => 'required|min:3',
        ]);
        
        $purpose = $request->input('purpose'); 
        $area = new Area();
        $area->purpose = $request->input('purpose');
        $area->save();
        Session::flash('flash_message', 'You have added a new set.  Would you like to build another?');
        return redirect('/goals/create');
//
    }  //
}
