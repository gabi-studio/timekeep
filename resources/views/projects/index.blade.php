@extends('layout')

@section('content')
<h1>Manage Projects</h1>

<!-- Link to create a new project -->
<a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>

<!-- projects is a variable passed from the controller to the view -->
<!-- it is an array of projects, so we can loop through it -->
@foreach ($projects as $project)
    <div class="project-card">
        <h3>{{ $project->name }}</h3>
        <p><strong>Description:</strong> {{ $project->description }}</p>
        <p><strong>Type:</strong> {{ $project->project_type }}</p>
        <p><strong>Status:</strong> {{ $project->status }}</p>
        <p><strong>Client:</strong> {{ $project->client }}</p>
        <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}</p>
        <p><strong>End Date:</strong> {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : 'N/A' }}</p>
        <p><strong>Priority:</strong> {{ $project->priority }}</p>
        <p><strong>Link:</strong> <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
        <p><strong>Image:</strong> <img src="{{ $project->image }}" alt="Project Image" style="max-width: 100px;"></p>
        <p><strong>Notes:</strong> {{ $project->notes }}</p>

        <!-- Edit and Delete actions -->
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
        
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
            {{ csrf_field() }}
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?');">
        </form>
    </div>
    <hr>
@endforeach

@endsection
