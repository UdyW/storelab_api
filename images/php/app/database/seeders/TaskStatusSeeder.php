<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     \App\Models\TaskStatus::create(['description' => 'new']);
     \App\Models\TaskStatus::create(['description' => 'completed']);
     \App\Models\TaskStatus::create(['description' => 'deleted']);
    }
}
