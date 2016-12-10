@extends('layouts.master')

@section('content')


    <h1>Every workout you have recorded</h1>

    @if(sizeof($goals) == 0)
        You must have some goals of what you want to accomplish. <a href='/workouts/create'>Declare your goals.</a> 
    @else
    <a href='/goals/create'>Add another goal.</a>
        <div id='goals' class='uncomplete'>
        <table>
        	<tr>
        		<th> Started on </th>
            <th> Improving type of performance</th>
        		<th> You Want to</th>
        		<th> Measure at</th>
        		<th> You started at</th>
        		<th> </th>
        		<th> </th>
        		<th> </th>
        	</tr>
            @foreach($goals as $goal)
            @if($goal->completed==false)
            	<tr>
                  <td>{{ $goal->created_at }}</td>
                  <td>{{ $goal->area->purpose}}</td>
                  <td>{{ $goal->description}}
                  <td>{{ $goal->quantifier }}</td>
                  <td>{{ $goal->starting_point}}</td>
                 <td><a class='button' href='/workouts/{{ $goal->id }}/edit'><i class='fa fa-pencil'></i> Adjust</a></td>
                 <td><a class='button' href='/workouts/{{ $goal->id }}'><i class='fa fa-eye'></i> Analyze</a></td>
                 <td><a class='button' href='/workouts/{{ $goal->id }}/qapla'><i class='fa fa-trash'></i> Completed</a></td>
                </tr>
                @endif
            @endforeach
            </table>
        </div>
        <table class="complete">
        	<tr>
        		<th> Started on </th>
            	<th> Improving type of performance</th>
        		<th> You Want to</th>
        		<th> Measure at</th>
        		<th> You started at</th>
        		</tr>
         @foreach($goals as $goal)
            @if($goal->completed==true)
    		<tr>
                  <td>{{ $goal->created_at }}</td>
                  <td>{{ $goal->area->purpose}}</td>
                  <td>{{ $goal->description}}
                  <td>{{ $goal->quantifier }}</td>
                  <td>{{ $goal->starting_point}}</td>
        	</tr>
        </table>
        @endif
        @endforeach
    @endif

@endsection