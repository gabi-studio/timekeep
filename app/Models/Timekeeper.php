<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timekeeper extends Model
{
    /** @use HasFactory<\Database\Factories\TimekeeperFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
