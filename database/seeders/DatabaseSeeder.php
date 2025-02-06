<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Grade;
use App\Models\User;
use App\Models\Student;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Student::factory(200)->create();

        Department::factory(5)->create();

        Grade::factory(33)->create();

        User::factory(5)->create();
    }
}
