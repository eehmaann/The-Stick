@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8">
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
           <label>Description of what you want to accomplish</label>
            <input
                type='text'
                id='description'
                name='description'
                value='{{ old('description', 'Run a marathon') }}'
            >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>


        <div class='form-group'>
           <label>Define success in a number (e.g. miles, pace, weight)</label>
           <input
               type='text'
               id='quantifier'
               name='quantifier'
               value='{{ old('quantifier', '26') }}'
           >
           <div class='error'>{{ $errors->first('quantifier') }}</div>
        </div>

        <div class='form-group'>
           <label>What is your starting point in numbrers</label>
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
	</div>
	<div class="col-md-4">
<h2>Don't have the category type you want? Add another.</h2>

    <form method='POST' action='/areas'>

        {{ csrf_field() }}

	<p>  What is the new category option that you would like to add for your goals and workouts?</p>
        <div class='form-group'>
           <label>Name Category</label>
            <input
                type='text'
                id='purpose'
                name='purpose'
                value='{{ old('description', 'Other') }}'
            >
           <div class='error'>{{ $errors->first('purpose') }}</div>

		</div>
        <div class='form-instructions'>
            You can't submit a blank answer.
        </div>

        <button type="submit" class="btn btn-primary">Add Goal Category</button>

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
    </div>
</div>
</div>

@stop