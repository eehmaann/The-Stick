@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Every workout you have recorded</h1>

    @if(sizeof($workouts) == 0)
        You need to start doing and <a href='/workouts/create'>recorded your workouts.</a> 
         Measuring leads to success.
    @else
        <table class ="table table-bordered table-striped">
        	<tr>
        		<th> Done on </th>
        		<th> You did</th>
        		<th> At </th>
        		<th> Focus</th>
        		<th> While pursing</th>
        		<th> While feeling</th>
        		<th> </th>
        		<th> </th>
        		<th> </th>
        	</tr>
            @foreach($workouts as $workout)
            	<tr>
                  <td>{{ $workout->created_at }}</td>
                  <td>{{ $workout->workdescription }}</td>
                  <td>{{ $workout->workquantifier }}</td>
                  <td>{{ $workout->area->purpose}}</td>
                  <td>{{ $workout->goal->description }} {{ $workout->goal->quantifier }}</td>

                  <td>@foreach($workout->conditions as $condition)
                           {{ $condition->note }}
                        @endforeach
                  </td>
                 <td><a class='button' href='/workouts/{{ $workout->id }}/edit'> Edit</a></td>
                 <td><a class='button' href='/workouts/{{ $workout->id }}'>View</a></td>
                 <td><a class='button' href='/workouts/{{ $workout->id }}/delete'>Delete</a></td>
                </tr>
            @endforeach
            </table>
               <a href='/workouts/create'>Add another workout.</a> Measuring leads to success.
        </div>
    @endif
</div>
@endsection