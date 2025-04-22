<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_type',
        'status',
        'timekeeper_id',
        'client',
        'start_date',
        'end_date',
        'estimated_hours',
        'actual_hours',
        'priority',
        'link',
        'image',
        'notes',
    ];

    
    public function timekeeper()
    {
        return $this->belongsTo(Timekeeper::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
