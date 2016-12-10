@extends('layouts.master')

@section('title')
    Edit {{ $workout->workdescription }}
@stop

@section('content')

    <h1>Edit {{ $workout->all }} </h1>

    <form method='POST' action='/workouts/{{ $workout->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$workout->id}}' type='hidden'>

         <div class='form-group'>
            <label>Type of Workout</label>
            <select name='area_id'>
                @foreach($areas_for_dropdown as $area_id => $area)
                   <option
                    {{ ($area_id == $workout->area->id) ? 'SELECTED' : '' }}
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
                    {{ ($goal_id == $workout->goal->id) ? 'SELECTED' : '' }}
                    value='{{ $goal_id }}'
                    >{{ $goal }}</option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
           <label>workdescription</label>
            <input
                type='text'
                id='workdescription'
                name='workdescription'
                value='{{ old('workdescription', $workout->workdescription) }}'
            >
           <div class='error'>{{ $errors->first('workdescription') }}</div>
        </div>


        <div class='form-group'>
           <label>Number based description</label>
           <input
               type='text'
               id='workquantifier'
               name='workquantifier'
               value='{{ old('workquantifier', $workout->workquantifier) }}'
           >
           <div class='error'>{{ $errors->first('workquantifier') }}</div>
        </div>

         <div class='form-group'>
            <label>Condition</label>
            @foreach($conditions_for_checkboxes as $condition_id => $condition_note)
                <input 
                type='checkbox' 
                value='{{ $condition_id }}'
                 name='conditions[]' 
                  {{ (in_array($condition_note, $conditions_for_this_workout)) ? 'CHECKED' : '' }}
                  > 
                  {{ $condition_note }} 
                  <br>
            @endforeach
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Save changes</button>

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>


@stop