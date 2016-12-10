@extends('layouts.master')
@section('content') 
               <p>  You are trying to {{$goal->description}} at {{$goal->quantifier}}.</p>
               <p> In pursuing this goal you have done</p>
                @foreach($goal->workouts as $workout)
 <table>
        	<tr>
        		<th> On </th>
        		<th> You did</th>
        		<th> At </th>
        		<th> Focused on</th>
        	</tr>
            @foreach($workouts as $workout)
            	<tr>
                  <td>{{ $workout->created_at }}</td>
                  <td>{{ $workout->workdescription }}</td>
                  <td>{{ $workout->workquantifier }}</td>
                  <td>{{ $workout->area->purpose}}</td>
                </tr>
            @endforeach
            </table>
                        @endforeach
                <p>  Keep up your good work.  You will achieve your goals.  </p>
                 
<a class='button' href='/goals/{{ $goal->id }}/edit'><i class='fa fa-pencil'></i> Adjust the goal</a>
<a class='button' href='/goals/{{ $goal->id }}/qapla'><i class='fa fa-trash'></i> Mark complete</a>

    <br><br>
    <a class='return' href='/goals'>&larr; See all goals</a>

@endsection