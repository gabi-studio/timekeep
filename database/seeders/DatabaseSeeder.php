<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Timekeeper;
use App\Models\Project;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@timekeep.com',
        ]);

        Timekeeper::factory(10)->create();

        Project::factory(15)->create();

        Task::factory(50)->create();
 
        

    }
}
