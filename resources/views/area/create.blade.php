@extends('layouts.master')

@section('content')

    <h1>Add a new Set</h1>

    <form method='POST' action='/areas'>

        {{ csrf_field() }}

	<p>  What is the new category option that you would like to add for your goals and workouts?</p>
        <div class='form-group'>
           <label>description</label>
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