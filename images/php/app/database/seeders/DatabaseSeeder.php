<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'udy@1234.com',
            'password'=> '$2y$12$skdwXuaGExmcIgSymrgPC.29LRFKdS0/Kj7Qo.SSSnb8NMc1OyaQe' // this is the hash for 1234 :)
        ]);
    }
}
