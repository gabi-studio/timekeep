@extends('layout')

@section('content')
<h1>Manage Timekeepers</h1>

<!-- Link to create a new timekeeper -->
<a href="{{ route('timekeepers.create') }}" class="btn btn-primary">Add New Timekeeper</a>

<!-- timekeepers is a variable passed from the controller to the view -->
<!-- it is an array of timekeepers, so we can loop through it -->
    @foreach ($timekeepers as $timekeeper)
        <p>{{ $timekeeper->name }} | 
            <a href="{{ route('timekeepers.edit', $timekeeper->id) }}">Edit</a></p>
        <form action="{{ route('timekeepers.destroy', $timekeeper->id) }}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
            <!-- <input type="hidden" id="{{ $timekeeper->id }}"> -->
            <input type="submit" value="Delete">
        </form>
    @endforeach

@endsection

