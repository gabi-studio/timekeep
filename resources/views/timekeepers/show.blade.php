@extends('layout')

@section('content')
<h1>Timekeeper Details</h1>

<!-- Display the timekeeper's details -->
<p><strong>Name:</strong> {{ $timekeeper->name }}</p>
<p><strong>Email:</strong> {{ $timekeeper->email }}</p>
<p><strong>Role:</strong> {{ ucfirst($timekeeper->role) }}</p>

<!-- Add the Edit and Delete options -->
<a href="{{ route('timekeepers.edit', $timekeeper->id) }}">Edit</a>

<form action="{{ route('timekeepers.destroy', $timekeeper->id) }}" method="POST" style="display:inline;">
    {{ csrf_field() }}
    @method('DELETE')
    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this timekeeper?');">
</form>

@endsection
