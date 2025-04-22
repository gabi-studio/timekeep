@extends('layout')

@section('content')
<h1>Project Details</h1>

<p><strong>Name:</strong> {{ $project->name }}</p>
<p><strong>Description:</strong> {{ $project->description }}</p>
<p><strong>Project Type:</strong> {{ $project->project_type }}</p>
<p><strong>Status:</strong> {{ $project->status }}</p>
<p><strong>Client:</strong> {{ $project->client }}</p>
<p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}</p>
<p><strong>End Date:</strong> {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : 'N/A' }}</p>
<p><strong>Estimated Hours:</strong> {{ $project->estimated_hours }}</p>
<p><strong>Actual Hours:</strong> {{ $project->actual_hours }}</p>
<p><strong>Priority:</strong> {{ $project->priority }}</p>
<p><strong>Link:</strong> <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
<p><strong>Image:</strong> <img src="{{ $project->image }}" alt="Project Image" style="max-width: 100px;"></p>
<p><strong>Notes:</strong> {{ $project->notes }}</p>

<!-- Edit and Delete actions -->
<a href="{{ route('projects.edit', $project->id) }}">Edit</a>

<form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
    {{ csrf_field() }}
    @method('DELETE')
    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this project?');">
</form>
@endsection
