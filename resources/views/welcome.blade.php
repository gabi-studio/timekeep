@extends('layout')

@section('content')
<h1>Dashboard</h1>

<!-- Filters Form -->
<form method="GET" action="{{ route('welcome') }}">
    <div>
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id">
            <option value="all">All Projects</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="date_due">Date Due:</label>
        <input type="date" name="date_due" id="date_due" value="{{ request('date_due') }}">
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="">All Statuses</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="priority">Priority:</label>
        <select name="priority" id="priority">
            <option value="">All Priorities</option>
            @foreach ($priorities as $priority)
                <option value="{{ $priority }}" {{ request('priority') == $priority ? 'selected' : '' }}>{{ $priority }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">Filter</button>
    </div>
</form>

<!-- Sorting Form -->
<form method="GET" action="{{ route('welcome') }}" style="display:inline;">
    <div>
        <label for="sort_by">Sort By:</label>
        <select name="sort_by" id="sort_by">
            <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>Priority</option>
            <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name (A-Z)</option>
            <option value="date" {{ request('sort_by') == 'date' ? 'selected' : '' }}>Date Due</option>
        </select>

        <label for="sort_order">Order:</label>
        <select name="sort_order" id="sort_order">
            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
        
        <button type="submit">Sort</button>
    </div>
</form>

<!-- Tasks Table -->
<table>
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Project</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->project->name }}</td> <!-- Assuming the task has a project -->
            <td>{{ $task->status }}</td>
            <td>{{ $task->priority }}</td>
            <td>{{ \Carbon\Carbon::parse($task->date)->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div>
    {{ $tasks->links() }}
</div>

@endsection
