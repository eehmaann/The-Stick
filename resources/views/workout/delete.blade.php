@extends('layouts.master')

@section('title')
    Confirm deletion
@endsection

@section('content')

<div class="container">
    <h1>Confirm deletion</h1>
    <form method='POST' action='/workouts/{{ $workout->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h2>Are you sure you want to delete <em> doing {{ $workout->workdescription }} at 
        {{$workout->workquantifier}} on {{ $workout->created_at}}</em>?</h2>

        <input type='submit' value='Yes'>
        
    </form>
</div>
@endsection