@extends('layouts.master')

@section('content')

    <h1>Add a new Goal</h1>

    <form method='POST' action='/goals'>

        {{ csrf_field() }}

         <div class='form-group'>
            <label>Type of Goal</label>
            <select name='area_id'>
                @foreach($areas_for_dropdown as $area_id => $area)
                    <option
                    value='{{ $area_id }}'
                    >{{ $area }}</option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
           <label>description</label>
            <input
                type='text'
                id='description'
                name='description'
                value='{{ old('description', 'Run a marathon') }}'
            >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>


        <div class='form-group'>
           <label>Number based goal</label>
           <input
               type='text'
               id='quantifier'
               name='quantifier'
               value='{{ old('quantifier', '26') }}'
           >
           <div class='error'>{{ $errors->first('quantifier') }}</div>
        </div>

        <div class='form-group'>
           <label>Starting number</label>
           <input
               type='text'
               id='starting_point'
               name='starting_point'
               value='{{ old('starting_point', '10') }}'
           >
           <div class='error'>{{ $errors->first('starting_point') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Add Goal</button>

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


@stop