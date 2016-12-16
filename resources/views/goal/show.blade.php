@extends('layouts.master')
@section('content') 
<div class="container">
               <h2>  You are trying to {{$goal->description}} at {{$goal->quantifier}}.</h2>
               <p> In pursuing this goal you have done</p>
 <table class="table">
        	<tr>
        		<th> On </th>
        		<th> You did</th>
        		<th> At </th>
        		<th> Focused on</th>
        	</tr>
            @foreach($goal->workouts as $workout)
            	<tr>
                  <td>{{ $workout->created_at }}</td>
                  <td>{{ $workout->workdescription }}</td>
                  <td>{{ $workout->workquantifier }}</td>
                  <td>{{ $workout->area->purpose}}</td>
                </tr>
            @endforeach
            </table>

                <p>  Keep up your good work.  You will achieve your goals.  </p>
                 
<a class='btn btn-warning' href='/goals/{{ $goal->id }}/edit'><i'></i> Adjust the goal</a>
<a class='btn btn-success' href='/goals/{{ $goal->id }}/qapla'><i></i> Mark complete</a>

    <br><br>
    <a class='return' href='/goals'>&larr; See all goals</a>
</div>
@endsection