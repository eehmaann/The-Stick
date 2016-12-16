@extends('layouts.master')

@section('title')
    Edit {{ $goal->description }}
@stop

@section('content')
<div class="container">
    <h1>Edit {{ $goal->description }}</h1>
    <h2>Are you sure you don't want to stay with this goal?</h2>

    <form method='POST' action='/goals/{{ $goal->id }}'>

        {{ method_field('PUT') }}

        {{ csrf_field() }}

        <input name='id' value='{{$goal->id}}' type='hidden'>

         <div class='form-group'>
            <label>Type of Goal</label>
            <select name='area_id'>
                @foreach($areas_for_dropdown as $area_id => $area)
                   <option
                    {{ ($area_id == $goal->area->id) ? 'SELECTED' : '' }}
                    value='{{ $area_id }}'
                    >{{ $area }}</option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
           <label>Text Description</label>
            <input
                type='text'
                id='description'
                name='description'
                value='{{ old('description', $goal->description) }}'
            >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>


        <div class='form-group'>
           <label>Number Based Description</label>
           <input
               type='text'
               id='quantifier'
               name='quantifier'
               value='{{ old('quantifier', $goal->quantifier) }}'
           >
           <div class='error'>{{ $errors->first('quantifier') }}</div>
        </div>

        <div class='form-group'>
           <label>New Starting Point</label>
           <input
               type='text'
               id='starting_point'
               name='starting_point'
               value='{{ old('starting_point', $goal->starting_point) }}'
           >
           <div class='error'>{{ $errors->first('starting_point') }}</div>
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
</div>

@stop