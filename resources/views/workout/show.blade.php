@extends('layouts.master')
@section('content') 
	<div class="container">
               <p>  In pursuing your goals you did {{$workout->workdescription}} at {{$workout->workquantifier}}.</p>
               <p> You reported that during this workout you were on the conditions:</p>
               <ul> @foreach($workout->conditions as $condition)
                           <li>{{ $condition->note }}</li>
                        @endforeach
                </ul>
                <p class="lead">  Keep up your good work.  You will achieve your goals.  </p>
                 
                  <a class='btn btn-warning' href='/workouts/{{ $workout->id }}/edit'>Edit this workout</a>
    <a class='btn btn-danger' href='/workouts/{{ $workout->id }}/delete'>Delete this workout</a>

    <br><br>
    <a class='return' href='/workouts'>&larr; See all workouts</a>
</div>
@endsection