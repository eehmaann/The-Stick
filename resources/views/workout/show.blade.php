@extends('layouts.master')
@section('content') 
               <p>  In pursuing this goal you did {{$workout->workdescription}} at {{$workout->workquantifier}}.</p>
               <p> You reported that during this workout you were on the conditions:</p>
               <ul> @foreach($workout->conditions as $condition)
                           <li>{{ $condition->note }}</li>
                        @endforeach
                </ul>
                <p>  Keep up your good work.  You will achieve your goals.  </p>
                 
                  <a class='button' href='/workouts/{{ $workout->id }}/edit'><i class='fa fa-pencil'></i> Edit this workout</a>
    <a class='button' href='/workouts/{{ $workout->id }}/delete'><i class='fa fa-trash'></i> Delete this workout</a>

    <br><br>
    <a class='return' href='/workouts'>&larr; See all workouts</a>

@endsection