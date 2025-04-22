@extends('layout')

@section('content')
<h1>Manage Tasks</h1>

<!-- Link to create a new task -->
<a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>

<!-- tasks is a variable passed from the controller to the view -->
<!-- it is an array of tasks, so we can loop through it -->
@foreach ($tasks as $task)
    <div class="task-card">
        <h3>{{ $task->name }}</h3>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Project:</strong> {{ $task->project->name }}</p> <!-- Assuming the task has a related project -->
        <p><strong>Timekeeper:</strong> {{ $task->timekeeper->name }}</p> <!-- Assuming the task has a related timekeeper -->
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Priority:</strong> {{ $task->priority }}</p>
        <p><strong>Time Spent:</strong> {{ $task->time_spent }} hours</p>
        <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->date)->format('Y-m-d') }}</p>
        <p><strong>Notes:</strong> {{ $task->notes }}</p>

        <!-- Edit and Delete actions -->
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
        
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            {{ csrf_field() }}
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">
        </form>
    </div>
    <hr>
@endforeach

@endsection
