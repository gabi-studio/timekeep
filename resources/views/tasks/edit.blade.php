@extends('layout')

@section('content')
<h1>Edit Task</h1>

@if ($errors->any())
    <!-- Display validation errors if any -->
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT') <!-- Specify the HTTP method as PUT for updating data -->

    <label for="name">Task Name:</label>
    <input type="text" id="name" name="name" placeholder="Task Name" value="{{ old('name') ?? $task->name }}" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Task Description">{{ old('description') ?? $task->description }}</textarea>

    <label for="project_id">Project:</label>
    <select id="project_id" name="project_id" required>
        @foreach ($projects as $project)
            <option value="{{ $project->id }}" {{ (old('project_id') ?? $task->project_id) == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
        @endforeach
    </select>

    <label for="timekeeper_id">Timekeeper:</label>
    <select id="timekeeper_id" name="timekeeper_id" required>
        @foreach ($timekeepers as $timekeeper)
            <option value="{{ $timekeeper->id }}" {{ (old('timekeeper_id') ?? $task->timekeeper_id) == $timekeeper->id ? 'selected' : '' }}>{{ $timekeeper->name }}</option>
        @endforeach
    </select>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" placeholder="Task Status" value="{{ old('status') ?? $task->status }}" required>

    <label for="priority">Priority:</label>
    <input type="text" id="priority" name="priority" placeholder="Task Priority" value="{{ old('priority') ?? $task->priority }}" required>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="{{ old('date') ?? $task->date }}">

    <label for="time_spent">Time Spent (hours):</label>
    <input type="number" id="time_spent" name="time_spent" value="{{ old('time_spent') ?? $task->time_spent }}">

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes" placeholder="Task Notes">{{ old('notes') ?? $task->notes }}</textarea>

    <label for="link">Link:</label>
    <input type="url" id="link" name="link" placeholder="Task Link" value="{{ old('link') ?? $task->link }}">

    <button type="submit">Update Task</button>
</form>
@endsection
