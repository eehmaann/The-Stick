@extends('layouts.master')

@section('title')
    Add a new workout
@stop

@section('content')
<div class="container">
	<div class="row">
	<div class="col-sm-8">
    <h1>Add a new Workout</h1>

    <form method='POST' action='/workouts'>

        {{ csrf_field() }}

         <div class='form-group'>
            <label>Type of Workout</label>
            <select name='area_id'>
                @foreach($areas_for_dropdown as $area_id => $area)
                    <option
                    value='{{ $area_id }}'
                    >{{ $area }}</option>
                @endforeach
            </select>
        </div>
        <div class='form-group'>
            <label>Towards Goal</label>
            <select name='goal_id'>
                @foreach($goals_for_dropdown as $goal_id => $goal)
                    <option
                    value='{{ $goal_id }}'
                    >{{ $goal }}</option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
           <label>What activity did you do?</label>
            <input
                type='text'
                id='workdescription'
                name='workdescription'
                value='{{ old('workdescription', 'Run a number of miles') }}'
            >
           <div class='error'>{{ $errors->first('workdescription') }}</div>
        </div>


        <div class='form-group'>
           <label>Number based description of what you did.  (e.g. pace, reps, weight)</label>
           <input
               type='text'
               id='workquantifier'
               name='workquantifier'
               value='{{ old('workquantifier', '12') }}'
           >
           <div class='error'>{{ $errors->first('workquantifier') }}</div>
        </div>

         <div class='form-group'>
            <label>Condition</label>
            @foreach($conditions_for_checkboxes as $condition_id => $condition_note)
                <input type='checkbox' value='{{ $condition_id }}' name='conditions[]'> {{ $condition_note }} <br>
            @endforeach
        </div>

        <div class='form-instructions'>
            All fields are required except for conditions
        </div>


        <button type="submit" class="btn btn-primary">Add Workout</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>
    </div> <!--end larger grid section-->
     <div class="col-sm-4">
 <h2>Is there another condition?</h2>

    <form method='POST' action='/conditions'>

        {{ csrf_field() }}

	<p> What else might be effecting your workouts?</p>
        <div class='form-group'>
           <label>Description</label>
            <input
                type='text'
                id='note'
                name='note'
                value='{{ old('description', 'Your Answer') }}'
            >
           <div class='error'>{{ $errors->first('note') }}</div>

		</div>
        <div class='form-instructions'>
            You can't submit a blank answer.
        </div>

        <button type="submit" class="btn btn-primary">Add Condition</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>
	</div>	<!--end grid section-->
	</div> <!--end row-->
</div>  <!-- end container-->
@stop