<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display the dashboard with filtered tasks.
     */
    public function index(Request $request)
    {
        // Get all projects for the filter dropdown
        $projects = Project::all();
        
        // Get unique status and priority values dynamically from the tasks table
        $statuses = Task::distinct()->pluck('status');
        $priorities = Task::distinct()->pluck('priority');
        
        // Initialize query for tasks
        $tasksQuery = Task::query();

        // Apply filters based on the request
        if ($request->has('project_id') && $request->project_id != 'all') {
            $tasksQuery->where('project_id', $request->project_id);
        }

        if ($request->has('date_due') && $request->date_due) {
            $tasksQuery->whereDate('date', '=', $request->date_due);
        }

        if ($request->has('status') && $request->status) {
            $tasksQuery->where('status', $request->status);
        }

        if ($request->has('priority') && $request->priority) {
            $tasksQuery->where('priority', $request->priority);
        }

        // Apply sorting based on the request
        if ($request->has('sort_by') && in_array($request->sort_by, ['priority', 'status', 'name', 'date'])) {
            $sortOrder = $request->get('sort_order', 'asc');
            $tasksQuery->orderBy($request->sort_by, $sortOrder);
        }

        // Get tasks with pagination
        $tasks = $tasksQuery->paginate(10)->appends($request->all());  // Retain query parameters across pagination

        return view('welcome', compact('tasks', 'projects', 'statuses', 'priorities'));
    }
}
