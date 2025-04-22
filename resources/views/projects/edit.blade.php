@extends('layout')

@section('content')
<h1>Edit Project</h1>

@if ($errors->any())
    <!-- Display validation errors if any -->
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Project Name" value="{{ old('name') ?? $project->name }}" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Project Description">{{ old('description') ?? $project->description }}</textarea>

    <label for="project_type">Project Type:</label>
    <input type="text" id="project_type" name="project_type" placeholder="Project Type" value="{{ old('project_type') ?? $project->project_type }}" required>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" placeholder="Project Status" value="{{ old('status') ?? $project->status }}" required>

    <label for="client">Client:</label>
    <input type="text" id="client" name="client" placeholder="Client Name" value="{{ old('client') ?? $project->client }}">

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') ?? $project->start_date }}" required>

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') ?? $project->end_date }}">

    <label for="estimated_hours">Estimated Hours:</label>
    <input type="number" id="estimated_hours" name="estimated_hours" value="{{ old('estimated_hours') ?? $project->estimated_hours }}">

    <label for="actual_hours">Actual Hours:</label>
    <input type="number" id="actual_hours" name="actual_hours" value="{{ old('actual_hours') ?? $project->actual_hours }}">

    <label for="priority">Priority:</label>
    <input type="text" id="priority" name="priority" placeholder="Priority" value="{{ old('priority') ?? $project->priority }}" required>

    <label for="link">Link:</label>
    <input type="url" id="link" name="link" placeholder="Project Link" value="{{ old('link') ?? $project->link }}">

    <label for="image">Image:</label>
    <input type="text" id="image" name="image" placeholder="Image URL" value="{{ old('image') ?? $project->image }}">

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes" placeholder="Project Notes">{{ old('notes') ?? $project->notes }}</textarea>

    <button type="submit">Edit Project</button>
</form>
@endsection
