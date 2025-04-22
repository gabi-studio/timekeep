<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'timekeeper_id',
        'status',
        'priority',
        'start_date',
        'end_date',
        'estimated_hours',
        'actual_hours',
        'notes',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function timekeeper()
    {
        return $this->belongsTo(Timekeeper::class);
    }

}
