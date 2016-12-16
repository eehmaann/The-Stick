@extends('layouts.master')

@section('content')


    <h1>Everything you want to or have wanted to accomplish</h1>

    @if(sizeof($goals) == 0)
        You must have some goals of what you want to accomplish. <a href='/goals/create'>Declare your goals.</a> 
    @else
    <div class="container">
    	<h2> Current goals:</h2>
        <div id='goals' class='dream'>
        <table class='table'>
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
                 <td><a class='	btn btn-warning' href='/goals/{{ $goal->id }}/edit'><i></i> Adjust</a></td>
                 <td><a class='btn btn-info' href='/goals/{{ $goal->id }}'><i></i> Analyze</a></td>
                 <td><a class='btn btn-success' href='/goals/{{ $goal->id }}/qapla'><i></i> Completed</a></td>
                </tr>
                @endif
            @endforeach
            </table>
        </div>
         <a href='/goals/create' class="btn btn-primary">Start another goal.</a>
        <h2> Past Victories</h2>
        <table class="table-bordered completed">
        	<tr>
        		<th> Started on </th>
            	<th> Improving type of performance</th>
        		<th> You Want to</th>
        		<th> Measure at</th>
        		<th> You started at</th>
        		<th> You completed it on</th>
        		<th> </th>
        		</tr>
         @foreach($goals as $goal)
            @if($goal->completed==true)
    		<tr>
                  <td class="complete">{{ $goal->created_at }}</td>
                  <td class="complete">{{ $goal->area->purpose}}</td>
                  <td class="complete">{{ $goal->description}}
                  <td class="complete">{{ $goal->quantifier }}</td>
                  <td class="complete">{{ $goal->starting_point}}</td>
                  <td>{{ $goal->completed_on}}</td>
                  <td><a class='btn btn-info' href='/goals/{{ $goal->id }}'><i></i> Analyze</a></td>
        	</tr>
        @endif
        @endforeach
        </table>
        </div>
    @endif

@endsection