<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Timekeeper;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all tasks
        return view('tasks.index', [
            'tasks' => Task::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new task, with available projects and timekeepers
        return view('tasks.create', [
            'projects' => Project::all(),
            'timekeepers' => Timekeeper::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // Store the new task
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // Show a single task
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // Show the form to edit a task, with available projects and timekeepers
        return view('tasks.edit', [
            'task' => $task,
            'projects' => Project::all(),
            'timekeepers' => Timekeeper::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Update the task
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // Delete the task
        Task::destroy($task->id);
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
