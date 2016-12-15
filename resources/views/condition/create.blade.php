@extends('layouts.master')

@section('content')

    <h1>Add a new Condition</h1>

    <form method='POST' action='/conditions'>

        {{ csrf_field() }}

	<p> What other else might be effecting your workouts?</p>
        <div class='form-group'>
           <label>description</label>
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


@stop